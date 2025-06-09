<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\PageController;
use App\Http\Controllers\PesananController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\DestinasiController;
use App\Http\Controllers\Admin\AdminUserController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\AdminDestinasiController;
use App\Http\Controllers\Admin\AdminPesananController;
use App\Http\Controllers\Admin\AdminProfilController;

// Home Route - menggunakan HomeController
Route::get('/', [HomeController::class, 'index'])->name('home');

// Destinasi Routes
Route::get('/destinasi', [DestinasiController::class, 'index'])->name('destinasi.index');
Route::get('/destinasi/{destinasi}', [DestinasiController::class, 'show'])->name('destinasi.show');
Route::get('/destination', [DestinasiController::class, 'index'])->name('destination');

// Authentication Routes
Route::get('/login', [AuthController::class, 'showLoginForm'])->name('login');
Route::post('/login', [AuthController::class, 'login'])->name('login.post');
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');
Route::get('/register', [AuthController::class, 'showRegisterForm'])->name('register');
Route::post('/register', [AuthController::class, 'register'])->name('register.post');

// Pesanan Routes
Route::get('/pesan-tiket', [PesananController::class, 'index'])->name('pesan_tiket');
Route::post('/pesan-tiket', [PesananController::class, 'store'])->name('pesan_tiket.store');
Route::get('/pesan-tiket/daftar', [PesananController::class, 'daftarPesanan'])->name('pesan_tiket.show');

Route::get('/destination', [DestinasiController::class, 'index'])->name('destination');
Route::get('/destinasi', [DestinasiController::class, 'index'])->name('destinasi.index');

Route::post('/pesan/{destinasi}', [PesananController::class, 'store'])
    ->name('pesan.store')
    ->middleware('auth');

// Daftar Pesanan Routes
Route::get('/daftar-pesanan', [PesananController::class, 'daftarPesanan'])->middleware('auth')->name('daftar_pesanan');
Route::delete('/pesanan/{pesanan}/cancel', [PesananController::class, 'cancel'])->name('pesanan.cancel');
Route::get('/daftar-pesanan', [PesananController::class, 'daftarPesanan'])->name('daftar_pesanan');
Route::post('/pesanan/{pesanan}/upload-bukti', [PesananController::class, 'uploadBukti'])->name('pesanan.upload_bukti');

// Other Pages - commented out until controllers are created
// Route::get('/culinary', 'CulinaryController@index')->name('culinary');
// Route::get('/regional-art', 'RegionalArtController@index')->name('regional-art');
// Route::get('/history', 'HistoryController@index')->name('history');
// Route::get('/about', 'AboutController@index')->name('about');

// Admin Routes
Route::middleware(['auth', 'role:admin'])->group(function () {
    Route::get('/admin/dashboard', [DashboardController::class, 'index'])->name('admin.dashboard');
    Route::resource('/admin/destinasi', AdminDestinasiController::class);
    Route::resource('/admin/user', AdminUserController::class);
    Route::get('admin/profil/edit', [AdminProfilController::class, 'edit'])->name('admin.profil.edit');
    Route::put('admin/profil', [AdminProfilController::class, 'update'])->name('admin.profil.update');
    // Route untuk pesanan
    Route::get('/admin/pesanan', [AdminPesananController::class, 'index'])->name('pesanan.index');
    Route::get('/admin/pesanan/{pesanan}', [AdminPesananController::class, 'show'])->name('admin.pesanan.show');
    Route::patch('/admin/pesanan/{pesanan}/status', [AdminPesananController::class, 'updateStatus'])->name('admin.pesanan.updateStatus');
});

// User Routes
Route::middleware(['auth', 'role:user'])->group(function () {
    Route::get('/beranda', function () {
        return view('home');
    })->name('user.dashboard');
});
