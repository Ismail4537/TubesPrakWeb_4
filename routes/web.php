<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\EventController;
use App\Http\Controllers\Auth\RegisteredUserController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ContacController;
use App\Http\Controllers\ProfileController;

Route::get('/', function () {
    return view('front-page.home', ["title" => "Home"]);
});

Route::get('/about', function () {
    return view('front-page.about', ["title" => "About"]);
})->name('about');

Route::get('/profile', [ProfileController::class, 'index'])->middleware('auth')->name('profile');
Route::get('/profile/creator', [ProfileController::class, 'creator'])->middleware('auth')->name('profile.creator');

Route::get('/contac', [ContacController::class, 'index'])->middleware('auth')->name('contac');
Route::get('/contac/{id}', [ContacController::class, 'show'])->middleware('auth')->name('contac.show');

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


Route::get('/login', [LoginController::class, 'create'])->name('login');
Route::post('/login', [LoginController::class, 'store']);
Route::post('/logout', [LoginController::class, 'destroy'])->name('logout');

Route::get('/register', [RegisteredUserController::class, 'create'])->name('register');
Route::post('/register', [RegisteredUserController::class, 'store']);
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


