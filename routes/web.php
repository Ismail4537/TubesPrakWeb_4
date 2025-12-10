<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('dashboard.user');
});

Route::get('/dashboard', function () {
    return view('dashboard.home');
});
