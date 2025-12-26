<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PaymentController;

// Midtrans notifications do not use CSRF; keep in API routes
Route::post('/payment/midtrans/notify', [PaymentController::class, 'notify'])->name('api.payment.midtrans.notify');
