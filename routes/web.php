<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\RecommendationController;
use App\Http\Controllers\AdminController;

// Landing Page
Route::view('/', 'landing')->name('landing');

// Dashboard
Route::get('/dashboard', [AdminController::class, 'dashboard'])
    ->middleware('auth')
    ->name('dashboard');

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

Route::get('/preferensi', [RecommendationController::class, 'showPreferensi'])
    ->middleware('auth')
    ->name('preferensi.create');
Route::post('/preferensi', [RecommendationController::class, 'simpanPreferensi'])
    ->middleware('auth')
    ->name('preferensi.store');


// Halaman Hasil Rekomendasi
Route::get('/hasil-rekomendasi', [RecommendationController::class, 'hasilRekomendasi'])
    ->middleware('auth')
    ->name('rekomendasi.hasil');

    Route::get('/admin/wisata', [AdminController::class, 'kelolaWisata'])
    ->middleware('auth')
    ->name('admin.wisata.index');

// Riwayat Rekomendasi
Route::get('/riwayat-rekomendasi', [RecommendationController::class, 'riwayatRekomendasi'])
    ->middleware('auth')
    ->name('rekomendasi.riwayat');

    // Halaman Tambah Wisata
Route::get('/admin/wisata/tambah', [AdminController::class, 'tambahWisata'])
    ->middleware('auth')
    ->name('admin.wisata.create');

// Proses menyimpan wisata baru
Route::post('/admin/wisata', [AdminController::class, 'simpanWisata'])
    ->middleware('auth')
    ->name('admin.wisata.store');

// Menampilkan formulir edit wisata
Route::get('/admin/wisata/{id}/edit', [AdminController::class, 'editWisata'])
    ->middleware('auth')
    ->name('admin.wisata.edit');

// Memproses perubahan data wisata
Route::put('/admin/wisata/{id}', [AdminController::class, 'updateWisata'])
    ->middleware('auth')
    ->name('admin.wisata.update');
// Menghapus data wisata
Route::delete('/admin/wisata/{id}', [AdminController::class, 'hapusWisata'])
    ->middleware('auth')
    ->name('admin.wisata.destroy');