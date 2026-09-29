<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\PelangganAuthController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\PelangganController;
use App\Http\Controllers\Admin\LayananController;

Route::get('/', function () {
    return view('welcome');
});

// ======= admin =======
Route::prefix('admin')->group(function () {
    Route::get('/login', [LoginController::class, 'showLoginForm'])->name('admin.login');
    Route::post('/login', [LoginController::class, 'login'])->name('admin.login.submit');
    Route::post('/logout', [LoginController::class, 'logout'])->name('admin.logout');

    Route::middleware('auth')->group(function () {
        Route::get('/dashboard', [DashboardController::class, 'index'])->name('admin.dashboard');

        Route::resource('pelanggan', PelangganController::class)
            ->names('admin.pelanggan')
            ->except(['show']);
        
        Route::resource('layanan', LayananController::class)
            ->names('admin.layanan')
            ->except(['show']);
    });
});

// ========= pelanggan ==========
Route::get('/register', [PelangganAuthController::class, 'showRegisterForm'])->name('register');
Route::post('/register', [PelangganAuthController::class, 'register'])->name('register.submit');

Route::get('/login', [PelangganAuthController::class, 'showLoginForm'])->name('login');
Route::post('/login', [PelangganAuthController::class, 'login'])->name('login.submit');
Route::post('/logout', [PelangganAuthController::class, 'logout'])->name('logout');

Route::middleware('auth:pelanggan')->group(function () {
    Route::get('/pelanggan/dashboard', function () {
        return view('pelanggan.dashboard-placeholder');
    })->name('pelanggan.dashboard');
});