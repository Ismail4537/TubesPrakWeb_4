<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\EventController;
use App\Http\Controllers\UserController;

Route::get('/', function () {
    return view('front-page.home', ["title" => "Home"]);
});

Route::get('/about', function () {
    return view('front-page.about', ["title" => "About"]);
})->name('about');

Route::get('/profile', function () {
    return view('front-page.profile', ["title" => "Profile"]);
})->name('profile');

// Rute untuk Index (event.index)
Route::get('event', [EventController::class, 'index'])->name('event.index');
// Rute untuk Show (event.show), menggunakan parameter dinamis {id}
Route::get('event/{slug}', [EventController::class, 'show'])->name('event.show');

Route::get('/dashboard', function () {
    return view('dashboard.home');
});

Route::get('/dashboard/events', function () {
    return view('dashboard.events');
});

Route::get('/dashboard/categories', function () {
    return view('dashboard.categories');
});

Route::get('/dashboard/users', function () {
    return view('dashboard.users');
});


Route::post('/dashboard/users', function () {
    // Logika simpan dummygit
    return redirect()->back()->with('success', 'Data berhasil disimpan!');
})->name('users.store');

Route::put('/dashboard/users/update', function () {
    return redirect()->back()->with('success', 'Data berhasil diupdate (Dummy)!');
})->name('users.update');


Route::get('/login', function () {
    return view('login');
})->name('login');

Route::get('/register', function () {
    return view('register');
})->name('register');


