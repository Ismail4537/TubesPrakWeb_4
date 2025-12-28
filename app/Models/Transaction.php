<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Transaction extends Model
{
    use HasFactory;

    protected $table = 'transaction';

    protected $fillable = [
        'order_id',
        'event_id',
        'registrant_id',
        'payer_user_id',
        'payee_user_id',
        'amount',
        'status',
        'payment_type',
        'midtrans_transaction_id',
        'snap_token',
        'snap_redirect_url',
        'raw_notification',
    ];

    protected $casts = [
        'raw_notification' => 'array',
        'amount' => 'integer',
    ];

    public function event(): BelongsTo
    {
        return $this->belongsTo(Event::class, 'event_id');
    }

    public function registrant(): BelongsTo
    {
        return $this->belongsTo(Registrant::class, 'registrant_id');
    }

    public function payer(): BelongsTo
    {
        return $this->belongsTo(User::class, 'payer_user_id');
    }

    public function payee(): BelongsTo
    {
        return $this->belongsTo(User::class, 'payee_user_id');
    }
}
