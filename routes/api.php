<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PaymentController;
use App\Http\Controllers\GeocodingController;

// Midtrans notifications do not use CSRF; keep in API routes
Route::post('/payment/midtrans/notify', [PaymentController::class, 'notify'])->name('api.payment.midtrans.notify');

// OpenStreetMap / Nominatim geocoding proxy (helps avoid CORS and sets required headers)
Route::get('/geocoding/nominatim/search', [GeocodingController::class, 'nominatimSearch'])
    ->middleware('throttle:30,1')
    ->name('api.geocoding.nominatim.search');

Route::get('/geocoding/nominatim/reverse', [GeocodingController::class, 'nominatimReverse'])
    ->middleware('throttle:30,1')
    ->name('api.geocoding.nominatim.reverse');
