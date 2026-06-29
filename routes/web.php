<?php

use App\Http\Controllers\Auth\DashboardController;
use App\Http\Controllers\Auth\ProfileController;
use Illuminate\Support\Facades\Route;

Route::inertia('/', 'HomePage')->name('home');

Route::middleware(['auth'])->group(function () {
    // ----------- Dashboard -------------
    Route::get('/dashboard', [DashboardController::class, 'index'])->middleware('verified')->name('dashboard');

    // ----------- Profile -------------
    Route::get('/profile', [ProfileController::class, 'index'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'updateInfo'])->name('profile.info.update');
    Route::put('/profile', [ProfileController::class, 'updatePassword'])->name('profile.password.update');
});

require __DIR__ . '/auth.php';
