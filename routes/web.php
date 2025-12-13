<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('front-page.home', ["title" => "Home"]);
});

Route::get('/dashboard', function () {
    return view('dashboard.home');
});
