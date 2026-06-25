<?php

use Illuminate\Support\Facades\Route;

Route::inertia('/', 'HomePage')->middleware('verified')->name('home');

require __DIR__ . '/auth.php';
