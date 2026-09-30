<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\User\DashboardController as UserDashboardController;
use Illuminate\Support\Facades\Route;

Route::get('/', fn () => redirect()->route('login'));

// Guest only
Route::middleware('guest')->group(function () {
    Route::get('/login', [AuthController::class, 'showLogin'])->name('login');
    Route::post('/login', [AuthController::class, 'login']);
    Route::get('/register', [AuthController::class, 'showRegister'])->name('register');
    Route::post('/register', [AuthController::class, 'register']);
});

// Harus login
Route::middleware('auth')->group(function () {
    Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

    // Admin
    Route::middleware('role:admin')->prefix('admin')->name('admin.')->group(function () {
        Route::get('/dashboard', fn () => view('admin.dashboard'))->name('dashboard');
    });

    // User (siswa)
    Route::middleware('role:user')->prefix('user')->name('user.')->group(function () {
        Route::get('/dashboard', [UserDashboardController::class, 'index'])->name('dashboard');
    });
});