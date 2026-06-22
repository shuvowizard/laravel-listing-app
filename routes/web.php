<?php

use Illuminate\Support\Facades\Route;

Route::inertia('/', 'HomePage')->name('home');

require __DIR__ . '/auth.php';
