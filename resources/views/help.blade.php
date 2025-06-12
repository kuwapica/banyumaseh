@extends('layouts.app')

@section('title', 'Panduan Pengguna')

@section('content')
<div class="container py-5">
    <div class="row justify-content-center">
        <div class="col-lg-10">
            <div class="card border-0 shadow-lg">
                <div class="card-header bg-gradient-primary text-white py-3">
                    <div class="d-flex align-items-center">
                        <div class="flex-shrink-0">
                            <i class="fas fa-book-open fa-2x me-3"></i>
                        </div>
                        <div>
                            <h2 class="mb-0"><strong>Panduan Pengguna</strong></h2>
                            <p class="mb-0">Temukan cara menggunakan platform kami dengan mudah</p>
                        </div>
                    </div>
                </div>
                
                <div class="card-body p-4">
                    <div class="alert alert-info d-flex align-items-center">
                        <i class="fas fa-info-circle me-3 fs-4"></i>
                        <div>
                            Berikut adalah panduan langkah demi langkah dalam menggunakan website layanan destinasi wisata kami. 
                            Jika Anda menemui kesulitan, jangan ragu untuk menghubungi kami.
                        </div>
                    </div>

                    <div class="row g-4">
                        <!-- Sidebar Navigasi -->
                        <div class="col-md-4">
                            <div class="sticky-top" style="top: 20px;">
                                <div class="list-group">
                                    <a href="#sectionA" class="list-group-item list-group-item-action active">
                                        <i class="fas fa-user-plus me-2"></i>Registrasi/Login
                                    </a>
                                    <a href="#sectionB" class="list-group-item list-group-item-action">
                                        <i class="fas fa-search me-2"></i>Pencarian Wisata
                                    </a>
                                    <a href="#sectionC" class="list-group-item list-group-item-action">
                                        <i class="fas fa-ticket-alt me-2"></i>Booking Tiket
                                    </a>
                                    <a href="#sectionD" class="list-group-item list-group-item-action">
                                        <i class="fas fa-history me-2"></i>Riwayat Pemesanan
                                    </a>
                                </div>
                                
                                <div class="card mt-4">
                                    <div class="card-body text-center">
                                        <h5 class="card-title">Butuh Bantuan?</h5>
                                        <p class="card-text">Tim kami siap membantu Anda</p>
                                        <a href="#" class="btn btn-outline-primary btn-sm mb-2">
                                            <i class="fas fa-phone-alt me-1"></i> +62 812-3456-7890
                                        </a>
                                        <a href="#" class="btn btn-outline-primary btn-sm mb-2">
                                            <i class="fas fa-envelope me-1"></i> info@banyumaseh.com
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        
                        <!-- Konten Utama -->
                        <div class="col-md-8">
                            <!-- A. Registrasi/Login -->
                            <section id="sectionA" class="mb-5">
                                <div class="d-flex align-items-center mb-4">
                                    <div class="bg-primary text-white rounded-circle d-flex align-items-center justify-content-center" style="width: 40px; height: 40px;">
                                        <span class="fs-5">1</span>
                                    </div>
                                    <h3 class="ms-3 mb-0">Registrasi / Login</h3>
                                </div>
                                
                                <div class="card border-0 shadow-sm mb-4">
                                    <div class="card-header bg-light">
                                        <h5 class="mb-0"><i class="fas fa-user-plus me-2 text-primary"></i>Membuat Akun Baru</h5>
                                    </div>
                                    <div class="card-body">
                                        <div class="d-flex mb-3">
                                            <div class="me-3 text-primary">
                                                <i class="fas fa-check-circle"></i>
                                            </div>
                                            <div>
                                                <strong>Klik tombol "Daftar"</strong> di pojok kanan atas halaman
                                            </div>
                                        </div>
                                        <div class="d-flex mb-3">
                                            <div class="me-3 text-primary">
                                                <i class="fas fa-check-circle"></i>
                                            </div>
                                            <div>
                                                <strong>Isi formulir registrasi</strong> dengan lengkap: nama, email, dan password
                                            </div>
                                        </div>
                                        <div class="d-flex">
                                            <div class="me-3 text-primary">
                                                <i class="fas fa-check-circle"></i>
                                            </div>
                                            <div>
                                                <strong>Klik tombol "Daftar"</strong> dan verifikasi jika diminta
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                
                                <div class="card border-0 shadow-sm">
                                    <div class="card-header bg-light">
                                        <h5 class="mb-0"><i class="fas fa-sign-in-alt me-2 text-primary"></i>Login ke Sistem</h5>
                                    </div>
                                    <div class="card-body">
                                        <div class="d-flex mb-3">
                                            <div class="me-3 text-primary">
                                                <i class="fas fa-check-circle"></i>
                                            </div>
                                            <div>
                                                <strong>Klik tombol "Login"</strong> di pojok kanan atas
                                            </div>
                                        </div>
                                        <div class="d-flex mb-3">
                                            <div class="me-3 text-primary">
                                                <i class="fas fa-check-circle"></i>
                                            </div>
                                            <div>
                                                <strong>Masukkan email dan password</strong> yang telah didaftarkan
                                            </div>
                                        </div>
                                        <div class="d-flex">
                                            <div class="me-3 text-primary">
                                                <i class="fas fa-check-circle"></i>
                                            </div>
                                            <div>
                                                <strong>Klik tombol "Login"</strong> untuk masuk ke akun Anda
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </section>
                            
                            <!-- B. Pencarian -->
                            <section id="sectionB" class="mb-5">
                                <div class="d-flex align-items-center mb-4">
                                    <div class="bg-primary text-white rounded-circle d-flex align-items-center justify-content-center" style="width: 40px; height: 40px;">
                                        <span class="fs-5">2</span>
                                    </div>
                                    <h3 class="ms-3 mb-0">Pencarian Tempat Wisata</h3>
                                </div>
                                
                                <div class="card border-0 shadow-sm mb-4">
                                    <div class="card-header bg-light">
                                        <h5 class="mb-0"><i class="fas fa-search me-2 text-primary"></i>Menelusuri Tempat Wisata</h5>
                                    </div>
                                    <div class="card-body">
                                        <div class="d-flex mb-3">
                                            <div class="me-3 text-primary">
                                                <i class="fas fa-check-circle"></i>
                                            </div>
                                            <div>
                                                <strong>Gunakan kolom pencarian</strong> di halaman <span class="badge bg-primary">Destinasi</span>
                                            </div>
                                        </div>
                                        <div class="d-flex">
                                            <div class="me-3 text-primary">
                                                <i class="fas fa-check-circle"></i>
                                            </div>
                                            <div>
                                                <strong>Pilih kategori</strong> seperti <span class="badge bg-secondary">Wisata Alam</span>, <span class="badge bg-secondary">Kuliner</span>, dll dari filter samping
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                
                                <div class="card border-0 shadow-sm">
                                    <div class="card-header bg-light">
                                        <h5 class="mb-0"><i class="fas fa-info-circle me-2 text-primary"></i>Detail Tempat Wisata</h5>
                                    </div>
                                    <div class="card-body">
                                        <div class="d-flex mb-3">
                                            <div class="me-3 text-primary">
                                                <i class="fas fa-check-circle"></i>
                                            </div>
                                            <div>
                                                <strong>Klik salah satu destinasi</strong> dari daftar yang muncul
                                            </div>
                                        </div>
                                        <div class="d-flex">
                                            <div class="me-3 text-primary">
                                                <i class="fas fa-check-circle"></i>
                                            </div>
                                            <div>
                                                <strong>Halaman detail</strong> menampilkan foto, deskripsi, jam operasional, dan harga tiket
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </section>
                            
                            <!-- C. Booking -->
                            <section id="sectionC" class="mb-5">
                                <div class="d-flex align-items-center mb-4">
                                    <div class="bg-primary text-white rounded-circle d-flex align-items-center justify-content-center" style="width: 40px; height: 40px;">
                                        <span class="fs-5">3</span>
                                    </div>
                                    <h3 class="ms-3 mb-0">Booking Tiket</h3>
                                </div>
                                
                                <div class="card border-0 shadow-sm mb-4">
                                    <div class="card-header bg-light">
                                        <h5 class="mb-0"><i class="fas fa-ticket-alt me-2 text-primary"></i>Langkah Pemesanan Tiket</h5>
                                    </div>
                                    <div class="card-body">
                                        <div class="step">
                                            <div class="step-number bg-primary text-white">1</div>
                                            <div class="step-content">
                                                <strong>Login</strong> terlebih dahulu ke akun Anda
                                            </div>
                                        </div>
                                        <div class="step">
                                            <div class="step-number bg-primary text-white">2</div>
                                            <div class="step-content">
                                                Klik menu <strong>Booking</strong> di navigasi utama
                                            </div>
                                        </div>
                                        <div class="step">
                                            <div class="step-number bg-primary text-white">3</div>
                                            <div class="step-content">
                                                Isi data pemesan (nama, No Identitas (KTP/SIM), No HP)
                                            </div>
                                        </div>
                                        <div class="step">
                                            <div class="step-number bg-primary text-white">4</div>
                                            <div class="step-content">
                                                Pilih destinasi wisata dari dropdown <strong>Nama Wisata</strong>
                                            </div>
                                        </div>
                                        <div class="step">
                                            <div class="step-number bg-primary text-white">5</div>
                                            <div class="step-content">
                                                Tentukan tanggal kunjungan dan jumlah tiket
                                            </div>
                                        </div>
                                        <div class="step">
                                            <div class="step-number bg-primary text-white">6</div>
                                            <div class="step-content">
                                                Sistem akan menampilkan ringkasan harga otomatis
                                            </div>
                                        </div>
                                        <div class="step">
                                            <div class="step-number bg-primary text-white">7</div>
                                            <div class="step-content">
                                                Klik tombol <button class="btn btn-sm btn-success">Pesan Tiket Sekarang</button> untuk menyelesaikan
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                
                                <div class="card border-0 shadow-sm mb-4">
                                    <div class="card-header bg-light">
                                        <h5 class="mb-0"><i class="fas fa-money-bill-wave me-2 text-primary"></i>Pembayaran</h5>
                                    </div>
                                    <div class="card-body">
                                        <div class="alert alert-warning">
                                            <i class="fas fa-exclamation-triangle me-2"></i> Harap selesaikan pembayaran dalam waktu <strong>2x24 jam</strong>
                                        </div>
                                        
                                        <div class="d-flex mb-3">
                                            <div class="me-3 text-primary">
                                                <i class="fas fa-check-circle"></i>
                                            </div>
                                            <div>
                                                <strong>Lakukan pembayaran</strong> ke rekening yang tercantim
                                            </div>
                                        </div>
                                        <div class="d-flex mb-3">
                                            <div class="me-3 text-primary">
                                                <i class="fas fa-check-circle"></i>
                                            </div>
                                            <div>
                                                <strong>Unggah bukti transfer</strong> dengan menekan tombol <button class="btn btn-sm btn-primary">Upload Bukti</button>
                                            </div>
                                        </div>
                                        <div class="d-flex">
                                            <div class="me-3 text-primary">
                                                <i class="fas fa-check-circle"></i>
                                            </div>
                                            <div>
                                                Format yang didukung: <span class="badge bg-secondary">JPG</span>, <span class="badge bg-secondary">JPEG</span>, <span class="badge bg-secondary">PNG</span>, atau <span class="badge bg-secondary">PDF</span> (maks. 2MB)
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                
                                <div class="card border-0 shadow-sm">
                                    <div class="card-header bg-light">
                                        <h5 class="mb-0"><i class="fas fa-check-circle me-2 text-primary"></i>Konfirmasi</h5>
                                    </div>
                                    <div class="card-body">
                                        <div class="d-flex mb-3">
                                            <div class="me-3 text-primary">
                                                <i class="fas fa-check-circle"></i>
                                            </div>
                                            <div>
                                                <strong>Tim kami akan memverifikasi</strong> pembayaran Anda dalam 1x24 jam
                                            </div>
                                        </div>
                                        <div class="d-flex">
                                            <div class="me-3 text-primary">
                                                <i class="fas fa-check-circle"></i>
                                            </div>
                                            <div>
                                                <strong>Tiket dapat dilihat</strong> di menu <span class="badge bg-primary">Riwayat Pemesanan</span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </section>
                            
                            <!-- D. Riwayat Pemesanan -->
                            <section id="sectionD">
                                <div class="d-flex align-items-center mb-4">
                                    <div class="bg-primary text-white rounded-circle d-flex align-items-center justify-content-center" style="width: 40px; height: 40px;">
                                        <span class="fs-5">4</span>
                                    </div>
                                    <h3 class="ms-3 mb-0">Riwayat Pemesanan</h3>
                                </div>
                                
                                <div class="card border-0 shadow-sm mb-4">
                                    <div class="card-header bg-light">
                                        <h5 class="mb-0"><i class="fas fa-history me-2 text-primary"></i>Akses Riwayat</h5>
                                    </div>
                                    <div class="card-body">
                                        <div class="d-flex mb-3">
                                            <div class="me-3 text-primary">
                                                <i class="fas fa-check-circle"></i>
                                            </div>
                                            <div>
                                                <strong>Login</strong> ke akun Anda
                                            </div>
                                        </div>
                                        <div class="d-flex mb-3">
                                            <div class="me-3 text-primary">
                                                <i class="fas fa-check-circle"></i>
                                            </div>
                                            <div>
                                                <strong>Pilih menu "Booking"</strong> di navigasi pengguna
                                            </div>
                                        </div>
                                        <div class="d-flex">
                                            <div class="me-3 text-primary">
                                                <i class="fas fa-check-circle"></i>
                                            </div>
                                            <div>
                                                <strong>Klik tombol "Daftar Pesanan"</strong> untuk melihat riwayat
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                
                                <div class="card border-0 shadow-sm">
                                    <div class="card-header bg-light">
                                        <h5 class="mb-0"><i class="fas fa-table me-2 text-primary"></i>Informasi yang Tersedia</h5>
                                    </div>
                                    <div class="card-body">
                                        <div class="row">
                                            <div class="col-md-6">
                                                <ul class="list-group list-group-flush">
                                                    <li class="list-group-item d-flex align-items-center">
                                                        <i class="fas fa-map-marker-alt text-primary me-2"></i>
                                                        Nama tempat wisata
                                                    </li>
                                                    <li class="list-group-item d-flex align-items-center">
                                                        <i class="fas fa-barcode text-primary me-2"></i>
                                                        Kode Booking
                                                    </li>
                                                    <li class="list-group-item d-flex align-items-center">
                                                        <i class="far fa-calendar-alt text-primary me-2"></i>
                                                        Tanggal kunjungan
                                                    </li>
                                                </ul>
                                            </div>
                                            <div class="col-md-6">
                                                <ul class="list-group list-group-flush">
                                                    <li class="list-group-item d-flex align-items-center">
                                                        <i class="fas fa-ticket-alt text-primary me-2"></i>
                                                        Jumlah Tiket
                                                    </li>
                                                    <li class="list-group-item d-flex align-items-center">
                                                        <i class="fas fa-money-bill-wave text-primary me-2"></i>
                                                        Total Pembayaran
                                                    </li>
                                                    <li class="list-group-item d-flex align-items-center">
                                                        <i class="fas fa-info-circle text-primary me-2"></i>
                                                        Status pembayaran
                                                    </li>
                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </section>
                        </div>
                    </div>
                </div>
                
                <div class="card-footer bg-light">
                    <div class="text-center">
                        <h5 class="mb-3">Masih butuh bantuan?</h5>
                        <div class="d-flex justify-content-center gap-3">
                            <a href="#" class="btn btn-primary">
                                <i class="fas fa-phone-alt me-2"></i>Hubungi Kami
                            </a>
                            <a href="#" class="btn btn-outline-primary">
                                <i class="fas fa-envelope me-2"></i>Email
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<style>
    .step {
        display: flex;
        margin-bottom: 1rem;
        align-items: center;
    }
    
    .step-number {
        width: 30px;
        height: 30px;
        border-radius: 50%;
        display: flex;
        align-items: center;
        justify-content: center;
        margin-right: 15px;
        flex-shrink: 0;
        font-weight: bold;
    }
    
    .step-content {
        flex-grow: 1;
    }
    
    .bg-gradient-primary {
        background: linear-gradient(135deg, #3a7bd5 0%, #00d2ff 100%);
    }
    
    .card {
        border-radius: 10px;
        overflow: hidden;
    }
    
    .list-group-item.active {
        background-color: #3a7bd5;
        border-color: #3a7bd5;
    }
    
    .list-group-item {
        transition: all 0.3s ease;
    }
    
    .list-group-item:hover {
        background-color: #f8f9fa;
    }
</style>
@endsection