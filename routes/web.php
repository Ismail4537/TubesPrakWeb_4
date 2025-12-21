<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\EventController;
use App\Http\Controllers\Auth\RegisteredUserController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\DashboardEventController;
use App\Http\Controllers\DashboardUsersController;
use App\Http\Controllers\DashboardCategoryController;
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
Route::get('/profile/edit', [ProfileController::class, 'edit'])->middleware('auth')->name('profile.edit');
Route::put('/profile/update', [ProfileController::class, 'update'])->middleware('auth')->name('profile.update');

Route::get('/contac', [ContacController::class, 'index'])->name('contac');
Route::get('/contac/{id}', [ContacController::class, 'show'])->name('contac.show');

// Rute untuk Index (event.index)
Route::get('event', [EventController::class, 'index'])->name('event.index');
// Rute untuk Show (event.show), menggunakan parameter dinamis {id}
Route::get('event/{slug}', [EventController::class, 'show'])->name('event.show');

Route::get('/dashboard', function () {
    return view('dashboard.home');
})->middleware('isAdmin')->name('dashboard');

Route::get('/dashboard/events', [DashboardEventController::class, 'adminIndex'])->middleware('isAdmin')->name('dashboard.events.index');
Route::get('/dashboard/events/create', [DashboardEventController::class, 'create'])->middleware('isAdmin')->name('dashboard.events.create');
Route::post('/dashboard/events', [DashboardEventController::class, 'store'])->middleware('isAdmin')->name('dashboard.events.store');
Route::get('/dashboard/events/{id}/edit', [DashboardEventController::class, 'edit'])->middleware('isAdmin')->name('dashboard.events.edit');
Route::put('/dashboard/events/{id}', [DashboardEventController::class, 'update'])->middleware('isAdmin')->name('dashboard.events.update');
Route::delete('/dashboard/events/{id}', [DashboardEventController::class, 'destroy'])->middleware('isAdmin')->name('dashboard.events.destroy');
Route::get('/dashboard/categories', [DashboardCategoryController::class, 'index'])->middleware('isAdmin')->name('dashboard.categories');

Route::get('/dashboard/users', [DashboardUsersController::class, 'index'])->middleware('isAdmin')->name('dashboard.users.index');
Route::get('/dashboard/users/{id}/edit', [DashboardUsersController::class, 'edit'])->middleware('isAdmin')->name('dashboard.users.edit');
Route::put('/dashboard/users/{id}', [DashboardUsersController::class, 'update'])->middleware('isAdmin')->name('dashboard.users.update');
Route::delete('/dashboard/users/{id}', [DashboardUsersController::class, 'destroy'])->middleware('isAdmin')->name('dashboard.users.destroy');
Route::get('/dashboard/users/create', [DashboardUsersController::class, 'create'])->middleware('isAdmin')->name('dashboard.users.create');
Route::post('/dashboard/users', [DashboardUsersController::class, 'store'])->middleware('isAdmin')->name('dashboard.users.store');

Route::get('/login', [LoginController::class, 'create'])->middleware('guest')->name('login');
Route::post('/login', [LoginController::class, 'store'])->middleware('guest');
Route::post('/logout', [LoginController::class, 'destroy'])->middleware('auth')->name('logout');

Route::get('/register', [RegisteredUserController::class, 'create'])->middleware('guest')->name('register');
Route::post('/register', [RegisteredUserController::class, 'store'])->middleware('guest');
Route::resource('categories', DashboardCategoryController::class);




