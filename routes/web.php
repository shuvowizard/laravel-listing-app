<?php

use Illuminate\Support\Facades\Route;

// Route::get('/', function () {
//     return view('welcome');
// });

Route::get('/', function () {
    return inertia('HomePage');
})->name('home');

Route::get('/about', function () {
    return inertia('AboutPage');
})->name('about');

Route::get('/contact', function () {
    return inertia('ContactPage');
})->name('contact');

