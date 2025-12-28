<?php

namespace App\Services\Billing;

use App\Models\Event;
use App\Models\Transaction;
use App\Models\User;
use Illuminate\Support\Str;
use GuzzleHttp\Client;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\DB;
use GuzzleHttp\Exception\GuzzleException;
use GuzzleHttp\Exception\RequestException;

final class MidtransService
{
    private Client $client;
    private Client $coreClient;
    private string $serverKey;
    private string $baseUrl;
    private string $coreBaseUrl;

    public function __construct()
    {
        $this->serverKey = (string) config('midtrans.server_key');
        $this->baseUrl = rtrim((string) config('midtrans.snap_base_url'), '/') . '/';
        $this->coreBaseUrl = rtrim((string) config('midtrans.core_api_base_url'), '/') . '/';
        $this->client = new Client([
            'base_uri' => $this->baseUrl,
            'auth' => [$this->serverKey, ''],
            'headers' => [
                'Content-Type' => 'application/json',
            ],
            'http_errors' => true,
        ]);

        $this->coreClient = new Client([
            'base_uri' => $this->coreBaseUrl,
            'auth' => [$this->serverKey, ''],
            'headers' => [
                'Accept' => 'application/json',
            ],
            'http_errors' => true,
        ]);
    }

    /**
     * Create Snap transaction and persist local Transaction row
     */
    public function createSnapTransaction(Event $event, User $payer, int $amount, string $finishUrl): array
    {
        $payee = $event->creator;   // Event creator

        $orderId = 'evt-' . $event->id . '-' . now()->format('YmdHis') . '-' . Str::random(6);

        $txn = Transaction::create([
            'order_id' => $orderId,
            'event_id' => $event->id,
            'registrant_id' => null,
            'payer_user_id' => $payer->id,
            'payee_user_id' => $payee->id,
            'amount' => $amount,
            'status' => 'pending',
        ]);

        $payload = [
            'transaction_details' => [
                'order_id' => $orderId,
                'gross_amount' => $amount,
            ],
            'callbacks' => [
                // Midtrans will append: ?order_id=xxx&status_code=xxx&transaction_status=xxx
                'finish' => $finishUrl,
            ],
            'customer_details' => [
                'first_name' => $payer->name,
                'email' => $payer->email,
                'phone' => $payer->phone ?? null,
            ],
            'item_details' => [
                [
                    'id' => 'event-' . $event->id,
                    'price' => $amount,
                    'quantity' => 1,
                    'name' => $event->title ?? ('Event #' . $event->id),
                ],
            ],
        ];

        try {
            $resp = $this->client->post('transactions', [
                'json' => $payload,
            ]);
            $data = json_decode((string) $resp->getBody(), true);
        } catch (RequestException $e) {
            $body = $e->getResponse() ? (string) $e->getResponse()->getBody() : null;
            Log::error('Midtrans Snap error', [
                'message' => $e->getMessage(),
                'status' => $e->getResponse()?->getStatusCode(),
                'body' => $body,
                'base_uri' => $this->baseUrl,
            ]);
            throw new \RuntimeException('Midtrans Snap request failed', 0, $e);
        } catch (GuzzleException $e) {
            Log::error('Midtrans Guzzle error', [
                'message' => $e->getMessage(),
                'base_uri' => $this->baseUrl,
            ]);
            throw new \RuntimeException('Midtrans request failed', 0, $e);
        }

        $txn->update([
            'snap_token' => $data['token'] ?? null,
            'snap_redirect_url' => $data['redirect_url'] ?? null,
        ]);

        return [
            'order_id' => $orderId,
            'token' => $data['token'] ?? null,
            'redirect_url' => $data['redirect_url'] ?? null,
        ];
    }

    /**
     * Fetch order status from Midtrans Core API (v2/{order_id}/status).
     */
    public function fetchOrderStatus(string $orderId): array
    {
        try {
            $resp = $this->coreClient->get(rawurlencode($orderId) . '/status');
            return json_decode((string) $resp->getBody(), true) ?: [];
        } catch (RequestException $e) {
            $body = $e->getResponse() ? (string) $e->getResponse()->getBody() : null;
            Log::error('Midtrans Core API status error', [
                'message' => $e->getMessage(),
                'status' => $e->getResponse()?->getStatusCode(),
                'body' => $body,
                'base_uri' => $this->coreBaseUrl,
                'order_id' => $orderId,
            ]);
            throw new \RuntimeException('Midtrans status request failed', 0, $e);
        } catch (GuzzleException $e) {
            Log::error('Midtrans Core API Guzzle error', [
                'message' => $e->getMessage(),
                'base_uri' => $this->coreBaseUrl,
                'order_id' => $orderId,
            ]);
            throw new \RuntimeException('Midtrans status request failed', 0, $e);
        }
    }

    /**
     * Fallback sync: update local Transaction + registrant based on Core API status.
     * Useful when webhook cannot reach local/staging domain.
     */
    public function syncLocalTransactionFromMidtrans(string $orderId): ?Transaction
    {
        /** @var Transaction|null $txn */
        $txn = Transaction::where('order_id', $orderId)->first();
        if (!$txn) {
            return null;
        }

        $statusPayload = $this->fetchOrderStatus($orderId);
        $status = (string) ($statusPayload['transaction_status'] ?? '');
        $paymentType = (string) ($statusPayload['payment_type'] ?? '');
        $midtransId = (string) ($statusPayload['transaction_id'] ?? '');

        $mappedStatus = match ($status) {
            'capture', 'settlement' => 'paid',
            'pending' => 'pending',
            'deny' => 'denied',
            'expire' => 'expired',
            'cancel' => 'canceled',
            default => $status,
        };

        $txn->update([
            'status' => $mappedStatus ?: $txn->status,
            'payment_type' => $paymentType ?: $txn->payment_type,
            'midtrans_transaction_id' => $midtransId ?: $txn->midtrans_transaction_id,
        ]);

        if ($mappedStatus === 'paid') {
            $exists = DB::table('registrants')
                ->where('user_id', $txn->payer_user_id)
                ->where('event_id', $txn->event_id)
                ->exists();
            if (!$exists) {
                DB::table('registrants')->insert([
                    'user_id' => $txn->payer_user_id,
                    'event_id' => $txn->event_id,
                    'created_at' => now(),
                    'updated_at' => now(),
                ]);
            }
        }

        return $txn;
    }

    /**
     * Verify Midtrans signature.
     */
    public function isValidSignature(array $payload): bool
    {
        $orderId = (string) ($payload['order_id'] ?? '');
        $statusCode = (string) ($payload['status_code'] ?? '');
        $grossAmount = (string) ($payload['gross_amount'] ?? '');
        $signatureKey = (string) ($payload['signature_key'] ?? '');
        $computed = hash('sha512', $orderId . $statusCode . $grossAmount . $this->serverKey);
        return hash_equals($computed, $signatureKey);
    }

    /**
     * Handle Midtrans payment notification webhook.
     */
    public function handleNotification(array $payload): void
    {
        try {
            if (!$this->isValidSignature($payload)) {
                Log::warning('Midtrans signature invalid', $payload);
                return;
            }

            $orderId = $payload['order_id'] ?? null;
            if (!$orderId) {
                Log::warning('Midtrans payload missing order_id', $payload);
                return;
            }

            /** @var Transaction|null $txn */
            $txn = Transaction::where('order_id', $orderId)->first();
            if (!$txn) {
                Log::warning('Transaction not found for order_id ' . $orderId);
                return;
            }

            $status = (string) ($payload['transaction_status'] ?? '');
            $paymentType = (string) ($payload['payment_type'] ?? '');
            $midtransId = (string) ($payload['transaction_id'] ?? '');

            $mappedStatus = match ($status) {
                'capture', 'settlement' => 'paid',
                'pending' => 'pending',
                'deny' => 'denied',
                'expire' => 'expired',
                'cancel' => 'canceled',
                default => $status,
            };

            $txn->update([
                'status' => $mappedStatus,
                'payment_type' => $paymentType ?: $txn->payment_type,
                'midtrans_transaction_id' => $midtransId ?: $txn->midtrans_transaction_id,
                'raw_notification' => $payload,
            ]);

            if ($mappedStatus === 'paid') {
                // Ensure registrant exists after successful payment
                $exists = DB::table('registrants')
                    ->where('user_id', $txn->payer_user_id)
                    ->where('event_id', $txn->event_id)
                    ->exists();
                if (!$exists) {
                    DB::table('registrants')->insert([
                        'user_id' => $txn->payer_user_id,
                        'event_id' => $txn->event_id,
                        'created_at' => now(),
                        'updated_at' => now(),
                    ]);
                }
            }
        } catch (\Throwable $e) {
            Log::error('Midtrans notification handler error: ' . $e->getMessage(), [
                'trace' => $e->getTraceAsString(),
            ]);
        }
    }
}
