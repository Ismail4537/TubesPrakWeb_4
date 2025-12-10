<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('front-page.home', ["title" => "Home"]);
});

Route::get('/about', function () {
    return view('front-page.about', ["title" => "About"]);
});

Route::get('/event', function () {
    return view('front-page.event', ["title" => "Event"]);
});

Route::get('/contact', function () {
    return view('front-page.contact', ["title" => "Contact"]);
});

Route::get('/login', function () {
    return view('front-page.auth.login', ["title" => "Login"]);
});

Route::get('/register', function () {
    return view('front-page.auth.register', ["title" => "Register"]);
});

Route::get('/dashboard', function () {
    return view('dashboard.home');
});
