<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\EventController;

Route::get('/', function () {
    return view('front-page.home', ["title" => "Home"]);
});

// Rute untuk Index (event.index)
Route::get('event', [EventController::class, 'index'])->name('event.index');
// Rute untuk Show (event.show), menggunakan parameter dinamis {id}
Route::get('event/{slug}', [EventController::class, 'show'])->name('event.show');

Route::get('/dashboard', function () {
    return view('dashboard.home');
});
Route::get('/profile', function () {
    return view('profile');
});

Route::get('/login', function () {
    return view('login');
})->name('login');
