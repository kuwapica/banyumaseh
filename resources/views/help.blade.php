@extends('layouts.app')

@section('title', 'Panduan Pengguna')

@section('content')
<div class="container py-4">
    <div class="row justify-content-center">
        <div class="col-lg-10">
            <div class="card shadow-sm">
                <div class="card-header bg-primary text-white">
                    <h4 class="mb-0"><i class="fas fa-question-circle me-2"></i>Panduan Pengguna</h4>
                </div>
                <div class="card-body">
                    <p class="mb-4">Berikut adalah panduan langkah demi langkah dalam menggunakan website layanan destinasi wisata kami.</p>

                    <div class="accordion" id="helpAccordion">
                        <!-- A. Registrasi/Login -->
                        <div class="accordion-item">
                            <h2 class="accordion-header" id="headingA">
                                <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#collapseA" aria-expanded="true">
                                    A. Panduan Registrasi / Login
                                </button>
                            </h2>
                            <div id="collapseA" class="accordion-collapse collapse show" data-bs-parent="#helpAccordion">
                                <div class="accordion-body">
                                    <strong>Langkah-langkah membuat akun baru:</strong>
                                    <ul>
                                        <li>Klik tombol <strong>Daftar</strong> di pojok kanan atas.</li>
                                        <li>Isi formulir registrasi dengan lengkap: nama, email, dan password.</li>
                                        <li>Klik tombol <strong>Daftar</strong> dan verifikasi jika diminta.</li>
                                    </ul>
                                    <strong>Cara login ke sistem:</strong>
                                    <ul>
                                        <li>Klik tombol <strong>Login</strong>.</li>
                                        <li>Masukkan email dan password yang telah didaftarkan.</li>
                                        <li>Klik tombol <strong>Login</strong> untuk masuk ke akun Anda.</li>
                                    </ul>
                                </div>
                            </div>
                        </div>

                        <!-- B. Pencarian -->
                        <div class="accordion-item">
                            <h2 class="accordion-header" id="headingB">
                                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseB" aria-expanded="false">
                                    B. Panduan Pencarian Tempat Wisata
                                </button>
                            </h2>
                            <div id="collapseB" class="accordion-collapse collapse" data-bs-parent="#helpAccordion">
                                <div class="accordion-body">
                                    <strong>Cara menelusuri tempat wisata:</strong>
                                    <ul>
                                        <li>Gunakan kolom pencarian di halaman <strong>Destinasi</strong>.</li>
                                        <li>Pilih kategori seperti <em>Wisata Alam</em>, <em>Kuliner</em>, dll dari filter samping.</li>
                                    </ul>
                                    <strong>Cara melihat detail tempat wisata:</strong>
                                    <ul>
                                        <li>Klik salah satu destinasi dari daftar.</li>
                                        <li>Halaman detail menampilkan foto, deskripsi, jam operasional, dan harga tiket.</li>
                                    </ul>
                                </div>
                            </div>
                        </div>

                        <!-- C. Booking -->
                        <div class="accordion-item">
                            <h2 class="accordion-header" id="headingC">
                                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseC" aria-expanded="false">
                                    C. Panduan Booking Tiket
                                </button>
                            </h2>
                            <div id="collapseC" class="accordion-collapse collapse" data-bs-parent="#helpAccordion">
                                <div class="accordion-body">
                                    <strong>Langkah-langkah pemesanan tiket:</strong>
                                    <ul>
                                        <li><strong>Login</strong> Terlebih Dahulu</li>
                                        <li>Klik Halaman <strong>Booking</strong></li>
                                        <li>Isi data pemesan (nama, No Identitas (KTP/SIM), No Hp).</li>
                                        <li>Pilih destinasi wisata dari dropdown <strong>Nama Wisata</strong>.</li>
                                        <li>Tentukan tanggal kunjungan dan jumlah tiket.</li>
                                        <li>Sistem akan menampilkan ringkasan harga otomatis.</li>
                                        <li>Klik tombol <strong>Pesan Tiket Sekarang</strong>.</li>
                                    </ul>
                                    <strong>Lakukan pembayaran & unggah bukti pembayaran</strong>
                                    <ul>
                                        <li>Anda akan diminta untuk melakukan pembayaran ke rekening yang tercantum</li>
                                        <li>Tekan tombol <strong>Upload Bukti</strong> untuk mengunggah bukti transfer (bisa berupa foto atau screenshot).</li>
                                        <li>Format yang didukung: JPG, JPEG, PNG, atau PDF</li>
                                        <li>Ukuran maksimum file: 2MB</li>
                                        <li>Setelah file dipilih, klik tombol, <strong>Upload</strong>.</li>
                                    </ul>
                                    <strong>Konfirmasi dan Verifikasi:</strong>
                                    <ul>
                                        <li>Tim kami akan segera memverifikasi pembayaran Anda.</li>
                                        <li>Tiket juga bisa dilihat di <strong>Riwayat Pemesanan</strong>.</li>
                                    </ul>
                                </div>
                            </div>
                        </div>

                        <!-- D. Riwayat Pemesanan -->
                        <div class="accordion-item">
                            <h2 class="accordion-header" id="headingD">
                                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseD" aria-expanded="false">
                                    D. Panduan Melihat Riwayat Pemesanan
                                </button>
                            </h2>
                            <div id="collapseD" class="accordion-collapse collapse" data-bs-parent="#helpAccordion">
                                <div class="accordion-body">
                                    <strong>Cara mengakses riwayat pemesanan:</strong>
                                    <ul>
                                        <li>Login ke akun Anda.</li>
                                        <li>Pilih menu <strong>Booking</strong> di navigasi pengguna.</li>
                                        <li>Klik  tombol <strong>Daftar Pesanan</strong></li>
                                    </ul>
                                    <strong>Informasi yang tersedia:</strong>
                                    <ul>
                                        <li>Nama tempat wisata</li>
                                        <li>Kode Booking</li>
                                        <li>Tanggal kunjungan</li>
                                        <li>Jumlah Tiket</li>
                                        <li>Total Pembayaran</li>
                                        <li>Status pembayaran</li>
                                    </ul>
                                </div>
                            </div>
                        </div>

                        

                    <hr class="my-4">
                    <p>Masih butuh bantuan? Hubungi kami melalui kontak <strong>+62 812-3456-7890</strong> </a> atau email ke <strong>bantuan@wisatakita.id</strong>.</p>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
