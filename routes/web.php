<?php

use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\RegisterController;
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

Route::get('/login', [LoginController::class, 'create'])->name('login');
Route::get('/register', [RegisterController::class, 'create'])->name('register');
