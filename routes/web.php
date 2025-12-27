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
use App\Http\Controllers\UserReportController;
use App\Http\Controllers\EventReportController;
use App\Http\Controllers\HomeController;

Route::get('/', [HomeController::class, 'index'])->name('home');
// AJAX endpoint untuk Top Picks per tab
Route::get('/top-picks', [HomeController::class, 'topPicks'])->name('top.picks');

Route::get('/about', function () {
    return view('front-page.about', ["title" => "About"]);
})->name('about');

Route::get('/profile', [ProfileController::class, 'index'])->middleware('auth')->name('profile');
Route::get('/profile/creator', [ProfileController::class, 'creator'])->middleware('auth')->name('profile.creator');
Route::get('/profile/edit', [ProfileController::class, 'edit'])->middleware('auth')->name('profile.edit');
Route::put('/profile/update', [ProfileController::class, 'update'])->middleware('auth')->name('profile.update');

Route::get('/contac', [ContacController::class, 'index'])->name('contac');
// Live search (front) for contacts
Route::get('/contac/search', [ContacController::class, 'search'])->name('contac.search');
Route::get('/contac/{id}', [ContacController::class, 'show'])->name('contac.show');

// Rute untuk Index (event.index)
Route::get('event', [EventController::class, 'index'])->name('event.index');
// Live search (front)
Route::get('event/search', [EventController::class, 'search'])->name('event.search');
// Rute untuk Show (event.show), menggunakan parameter dinamis {id}
Route::get('event/show/{slug}', [EventController::class, 'show'])->name('event.show');
Route::get('event/edit/{id}', [EventController::class, 'edit'])->middleware('auth')->name('event.edit');
Route::get('event/create', [EventController::class, 'create'])->middleware('auth')->name('event.create');
Route::post('event/store', [EventController::class, 'store'])->middleware('auth')->name('event.store');
Route::put('event/update/{id}', [EventController::class, 'update'])->middleware('auth')->name('event.update');
Route::delete('event/delete/{id}', [EventController::class, 'destroy'])->middleware('auth')->name('event.destroy');
Route::get('event/payment/{slug}', [EventController::class, 'showPaymentEvent'])->middleware('auth')->name('event.payment');
Route::post('event/payment/{slug}', [EventController::class, 'processPayment'])->middleware('auth')->name('event.payment.process');

Route::get('/dashboard', function () {
    return view('dashboard.home', ['title' => 'Dashboard']);
})->middleware('isAdmin')->name('dashboard');

Route::get('/dashboard/events', [DashboardEventController::class, 'Index'])->middleware('isAdmin')->name('dashboard.events.index');
Route::post('/dashboard/events', [DashboardEventController::class, 'store'])->middleware('isAdmin')->name('dashboard.events.store');
Route::get('/dashboard/events/create', [DashboardEventController::class, 'create'])->middleware('isAdmin')->name('dashboard.events.create');
Route::get('/dashboard/events/edit/{id}', [DashboardEventController::class, 'edit'])->middleware('isAdmin')->name('dashboard.events.edit');
Route::put('/dashboard/events/update/{id}', [DashboardEventController::class, 'update'])->middleware('isAdmin')->name('dashboard.events.update');
Route::delete('/dashboard/events/delete/{id}', [DashboardEventController::class, 'destroy'])->middleware('isAdmin')->name('dashboard.events.destroy');
Route::get('/dashboard/categories', [DashboardCategoryController::class, 'index'])->middleware('isAdmin')->name('dashboard.categories');
Route::get('/dashboard/categories/create', [DashboardCategoryController::class, 'create'])->middleware('isAdmin')->name('dashboard.categories.create');
Route::get(
    '/dashboard/events/search',
    [DashboardEventController::class, 'search']
)->middleware('isAdmin')->name('dashboard.events.search');


Route::get('/dashboard/users', [DashboardUsersController::class, 'index'])->middleware('isAdmin')->name('dashboard.users.index');
Route::get('/dashboard/users/{id}/edit', [DashboardUsersController::class, 'edit'])->middleware('isAdmin')->name('dashboard.users.edit');
Route::put('/dashboard/users/{id}', [DashboardUsersController::class, 'update'])->middleware('isAdmin')->name('dashboard.users.update');
Route::delete('/dashboard/users/{id}', [DashboardUsersController::class, 'destroy'])->middleware('isAdmin')->name('dashboard.users.destroy');
Route::get('/dashboard/users/create', [DashboardUsersController::class, 'create'])->middleware('isAdmin')->name('dashboard.users.create');
Route::post('/dashboard/users', [DashboardUsersController::class, 'store'])->middleware('isAdmin')->name('dashboard.users.store');
// Live search (AJAX) for users
Route::get(
    '/dashboard/categories/search',
    [DashboardCategoryController::class, 'search']
)->middleware('isAdmin')->name('dashboard.categories.search');

Route::get(
    '/dashboard/users/search',
    [DashboardUsersController::class, 'search']
)->middleware('isAdmin')->name('dashboard.users.search');




Route::get('/login', [LoginController::class, 'create'])->middleware('guest')->name('login');
Route::post('/login', [LoginController::class, 'store'])->middleware('guest');
Route::post('/logout', [LoginController::class, 'destroy'])->middleware('auth')->name('logout');

Route::get('/register', [RegisteredUserController::class, 'create'])->middleware('guest')->name('register');
Route::post('/register', [RegisteredUserController::class, 'store'])->middleware('guest');
Route::resource('categories', DashboardCategoryController::class);

// PDF Reporting Routes
Route::get('/reports/users', [UserReportController::class, 'index'])->middleware('isAdmin')->name('reports.users.index');
Route::get('/reports/users/pdf/download', [UserReportController::class, 'downloadPDF'])->middleware('isAdmin')->name('reports.users.pdf.download');
Route::get('/reports/users/pdf/view', [UserReportController::class, 'viewPDF'])->middleware('isAdmin')->name('reports.users.pdf.view');

Route::get('/reports/events', [EventReportController::class, 'index'])->middleware('isAdmin')->name('reports.events.index');
Route::get('/reports/events/pdf/download', [EventReportController::class, 'downloadPDF'])->middleware('isAdmin')->name('reports.events.pdf.download');
Route::get('/reports/events/pdf/view', [EventReportController::class, 'viewPDF'])->middleware('isAdmin')->name('reports.events.pdf.view');
