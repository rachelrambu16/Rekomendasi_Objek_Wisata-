<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\HomeController;

// Halaman utama / Dashboard
Route::get('/', function () {
    return view('dashboard');
})->middleware('auth');

// Registrasi
Route::get('/registrasi', [AuthController::class, 'showRegistrasi'])
    ->name('registrasi');

Route::post('/registrasi', [AuthController::class, 'registrasi']);

// Login
Route::get('/login', [AuthController::class, 'showLogin'])
    ->name('login');

Route::post('/login', [AuthController::class, 'login']);

// Logout
Route::post('/logout', [AuthController::class, 'logout'])
    ->middleware('auth')
    ->name('logout');

// Halaman Jelajah Wisata
Route::get('/jelajah-wisata', [HomeController::class, 'jelajahWisata'])
    ->middleware('auth')
    ->name('wisata.index');
