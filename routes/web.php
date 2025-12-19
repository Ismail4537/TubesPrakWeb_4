<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\EventController;
use App\Http\Controllers\Auth\RegisteredUserController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\UsersController;
            

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

Route::get('/dashboard/events', [EventController::class, 'adminIndex'])->name('dashboard.events.index');
Route::get('/dashboard/events/create', [EventController::class, 'create'])->name('dashboard.events.create');
Route::post('/dashboard/events', [EventController::class, 'store'])->name('dashboard.events.store');
Route::get('/dashboard/events/{id}/edit', [EventController::class, 'edit'])->name('dashboard.events.edit');
Route::put('/dashboard/events/{id}', [EventController::class, 'update'])->name('dashboard.events.update');
Route::delete('/dashboard/events/{id}', [EventController::class, 'destroy'])->name('dashboard.events.destroy');
Route::get('/dashboard/categories', [App\Http\Controllers\CategoryController::class, 'index'])->name('dashboard.categories');

Route::get('/dashboard/users', [UsersController::class, 'index'])->name('dashboard.users.index');
Route::get('/dashboard/users/{id}/edit', [UsersController::class, 'edit'])->name('dashboard.users.edit');
Route::put('/dashboard/users/{id}', [UsersController::class, 'update'])->name('dashboard.users.update');
Route::delete('/dashboard/users/{id}', [UsersController::class, 'destroy'])->name('dashboard.users.destroy');
Route::get('/dashboard/users/create', [UsersController::class, 'create'])->name('dashboard.users.create');
Route::post('/dashboard/users', [UsersController::class, 'store'])->name('dashboard.users.store');

Route::get('/login', function () {
    return view('login');
})->name('login');

Route::get('/register', function () {
    return view('register');
})->name('register');

Route::resource('categories', CategoryController::class);





