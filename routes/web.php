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


Route::get('/contac', [ContacController::class, 'index'])->middleware('auth')->name('contac');
Route::get('/contac/{id}', [ContacController::class, 'show'])->middleware('auth')->name('contac.show');

// Rute untuk Index (event.index)
Route::get('event', [EventController::class, 'index'])->name('event.index');
// Rute untuk Show (event.show), menggunakan parameter dinamis {id}
Route::get('event/{slug}', [EventController::class, 'show'])->name('event.show');

Route::get('/dashboard', function () {
    return view('dashboard.home');
});

Route::get('/dashboard/events', [DashboardEventController::class, 'adminIndex'])->name('dashboard.events.index');
Route::get('/dashboard/events/create', [DashboardEventController::class, 'create'])->name('dashboard.events.create');
Route::post('/dashboard/events', [DashboardEventController::class, 'store'])->name('dashboard.events.store');
Route::get('/dashboard/events/{id}/edit', [DashboardEventController::class, 'edit'])->name('dashboard.events.edit');
Route::put('/dashboard/events/{id}', [DashboardEventController::class, 'update'])->name('dashboard.events.update');
Route::delete('/dashboard/events/{id}', [DashboardEventController::class, 'destroy'])->name('dashboard.events.destroy');
Route::get('/dashboard/categories', [DashboardCategoryController::class, 'index'])->name('dashboard.categories');

Route::get('/dashboard/users', [DashboardUsersController::class, 'index'])->name('dashboard.users.index');
Route::get('/dashboard/users/{id}/edit', [DashboardUsersController::class, 'edit'])->name('dashboard.users.edit');
Route::put('/dashboard/users/{id}', [DashboardUsersController::class, 'update'])->name('dashboard.users.update');
Route::delete('/dashboard/users/{id}', [DashboardUsersController::class, 'destroy'])->name('dashboard.users.destroy');
Route::get('/dashboard/users/create', [DashboardUsersController::class, 'create'])->name('dashboard.users.create');
Route::post('/dashboard/users', [DashboardUsersController::class, 'store'])->name('dashboard.users.store');

Route::get('/login', [LoginController::class, 'create'])->name('login');
Route::post('/login', [LoginController::class, 'store']);
Route::post('/logout', [LoginController::class, 'destroy'])->name('logout');

Route::get('/register', [RegisteredUserController::class, 'create'])->name('register');
Route::post('/register', [RegisteredUserController::class, 'store']);

Route::resource('categories', DashboardCategoryController::class);




