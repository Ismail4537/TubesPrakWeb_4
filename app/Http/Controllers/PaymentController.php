<?php

namespace App\Http\Controllers;

use App\Models\Event;
use Illuminate\Support\Facades\DB;
use App\Services\Billing\MidtransService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Response;

class PaymentController extends Controller
{
    public function show(Event $event, Request $request)
    {
        $amount = (int) round((float) ($event->price ?? 0));
        return view('front-page.payment', [
            'title' => 'Payment',
            'event' => $event,
            'user' => Auth::user(),
            'amount' => $amount,
            'clientKey' => (string) config('midtrans.client_key'),
            'isProduction' => (bool) config('midtrans.is_production'),
        ]);
    }
    public function create(Event $event, Request $request, MidtransService $midtrans)
    {
        if (!Auth::check()) {
            return Response::json(['message' => 'Unauthorized'], 403);
        }

        $amount = (int) ($request->input('amount') ?? 0);
        $eventPrice = (int) round((float) ($event->price ?? 0));
        if ($amount === 0) {
            $amount = $eventPrice;
        }
        if ($amount <= 0) {
            // Free event: directly register user to event
            $exists = DB::table('registrants')
                ->where('user_id', Auth::id())
                ->where('event_id', $event->id)
                ->exists();
            if (!$exists) {
                DB::table('registrants')->insert([
                    'user_id' => Auth::id(),
                    'event_id' => $event->id,
                    'created_at' => now(),
                    'updated_at' => now(),
                ]);
            }
            return Response::json(['status' => 'ok', 'registered' => true, 'free' => true]);
        }

        try {
            $result = $midtrans->createSnapTransaction($event, Auth::user(), $amount);
            return Response::json($result, 201);
        } catch (\Throwable $e) {
            return Response::json([
                'message' => 'Gagal membuat transaksi pembayaran. Cek konfigurasi Midtrans (server key / endpoint).',
            ], 502);
        }
    }

    public function notify(Request $request, MidtransService $midtrans)
    {
        $payload = $request->all();
        $midtrans->handleNotification($payload);
        return Response::json(['status' => 'ok']);
    }

    public function result(Event $event, Request $request)
    {
        $status = (string) $request->query('status', 'success');
        $orderId = $request->query('order_id');

        return view('front-page.payment-result', [
            'title' => 'Payment Result',
            'event' => $event,
            'status' => $status,
            'orderId' => $orderId,
        ]);
    }
}
