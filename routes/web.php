<?php

use App\Models\Artikel;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\PageController;
use App\Http\Controllers\ArtikelController;
use App\Http\Controllers\PesananController;

Route::get('/', [PageController::class, 'index'])->name('index');
Route::get('/pesanan', [PesananController::class, 'daftarPesanan'])->middleware('auth')->name('daftar_pesanan');

Route::get('/login', [AuthController::class, 'showLoginForm'])->name('login');
Route::post('/login', [AuthController::class, 'login'])->name('login.post');

Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

Route::get('/register', [AuthController::class, 'showRegisterForm'])->name('register');
Route::post('/register', [AuthController::class, 'register'])->name('register.post');

Route::get('/pesan-tiket', [PesananController::class, 'index'])->name('pesan_tiket');
Route::post('/pesan-tiket', [PesananController::class, 'store'])->name('pesan_tiket.store');

// Daftar Pesanan
Route::get('/daftar-pesanan', [PesananController::class, 'daftarPesanan'])->name('daftar_pesanan');
Route::delete('/pesanan/{pesanan}/cancel', [PesananController::class, 'cancel'])->name('pesanan.cancel');

Route::resource('artikel', ArtikelController::class);

// Route untuk admin
Route::middleware(['auth', 'role:admin'])->group(function () {
    Route::get('/admin/dashboard', function () {
        return view('admin.dashboard');
    })->name('admin.dashboard');
});

// Route untuk user
Route::middleware(['auth', 'role:user'])->group(function () {
    Route::get('/beranda', function () {
        return view('index');
    })->name('user.dashboard');
});
