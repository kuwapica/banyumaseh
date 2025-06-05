<?php

use App\Models\Artikel;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\PageController;
use App\Http\Controllers\ArtikelController;
use App\Http\Controllers\PesananController;
use App\Http\Controllers\DestinasiController;


Route::get('/', function () {
    return view('welcome');
});
   
Route::get('/', [PageController::class, 'index'])->name('home');
Route::get('/pesanan', [PesananController::class, 'daftarPesanan'])->middleware('auth')->name('daftar_pesanan');

// Authentication Routes
// Auth::routes();

// Other Pages
Route::get('/destination', 'DestinasiController@index')->name('destination');
Route::get('/culinary', 'CulinaryController@index')->name('culinary');
Route::get('/regional-art', 'RegionalArtController@index')->name('regional-art');
Route::get('/history', 'HistoryController@index')->name('history');
Route::get('/about', 'AboutController@index')->name('about');

Route::get('/login', [AuthController::class, 'showLoginForm'])->name('login');
Route::post('/login', [AuthController::class, 'login'])->name('login.post');

Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

Route::get('/register', [AuthController::class, 'showRegisterForm'])->name('register');
Route::post('/register', [AuthController::class, 'register'])->name('register.post');

Route::get('/pesan-tiket', [PesananController::class, 'index'])->name('pesan_tiket');
Route::post('/pesan-tiket', [PesananController::class, 'store'])->name('pesan_tiket.store');

Route::post('/pesan/{destinasi}', [PesananController::class, 'store'])
    ->name('pesan.store')
    ->middleware('auth');

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
        return view('home');
    })->name('user.dashboard');
});
