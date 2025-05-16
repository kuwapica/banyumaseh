<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PageController;
use App\Http\Controllers\AuthController;
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