<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\PageController;
use App\Http\Controllers\PesananController;
use App\Http\Controllers\DestinasiController;
use App\Http\Controllers\Admin\AdminUserController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\AdminDestinasiController;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/', [PageController::class, 'index'])->name('home');
Route::get('/pesanan', [PesananController::class, 'daftarPesanan'])->middleware('auth')->name('daftar_pesanan');

// Authentication Routes
// Auth::routes();

// Other Pages
// Route::get('/destinasi', 'DestinasiController@index')->name('destination');
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


Route::get('/destination', [DestinasiController::class, 'index'])->name('destination');
Route::get('/destinasi', [DestinasiController::class, 'index'])->name('destinasi.index');

Route::post('/pesan/{destinasi}', [PesananController::class, 'store'])
    ->name('pesan.store')
    ->middleware('auth');

// Daftar Pesanan
Route::get('/daftar-pesanan', [PesananController::class, 'daftarPesanan'])->name('daftar_pesanan');
Route::delete('/pesanan/{pesanan}/cancel', [PesananController::class, 'cancel'])->name('pesanan.cancel');

// Route::resource('destinasi', DestinasiController::class);
// Route::get('/admin/destinasi', [DestinasiController::class, 'index'])->name('destinasi.index');


// Route untuk admin
Route::middleware(['auth', 'role:admin'])->group(function () {
    Route::get('/admin/dashboard', [DashboardController::class, 'index'])->name('admin.dashboard');
    Route::resource('/admin/destinasi', AdminDestinasiController::class);
    Route::resource('/admin/user', AdminUserController::class);
});

// Route untuk user
Route::middleware(['auth', 'role:user'])->group(function () {
    Route::get('/beranda', function () {
        return view('home');
    })->name('user.dashboard');
});
