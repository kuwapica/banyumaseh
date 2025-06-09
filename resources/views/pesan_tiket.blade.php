@extends('layouts.app')

@section('title', 'Pesan Tiket Wisata')

@section('content')
<<<<<<< HEAD
    <div class="container py-5">
        <!-- Hero Section -->
        <div class="text-center mb-5">
            <h1 class="display-5 fw-bold text-primary mb-3">Pesan Tiket Wisata</h1>
            <p class="lead text-muted mx-auto" style="max-width: 700px;">Nikmati pengalaman wisata terbaik dengan pemesanan
                tiket yang mudah dan cepat</p>
=======
<div class="container">
    <!-- Hero Section -->
   
    <div class="text-center my-0">
        <h2 class="display-5 fw-bold text-primary mb-3">Pesan Tiket Wisata</h2>
        <p class="lead text-muted mx-auto" style="max-width: 700px;">Nikmati pengalaman wisata terbaik dengan pemesanan tiket yang mudah dan cepat</p>
    </div>
    <div class="d-flex justify-content-between align-items-center mb-4">
        <a href="{{ route('pesan_tiket.show') }}" class="btn btn-xl btn-outline-primary">
            Daftar Pesanan <i class="bi bi-arrow-right ms-1"></i>
        </a>
    </div>
    <div class="row g-4">
        <!-- Booking Form -->
        <div class="col-lg-8">
            <div class="card border-0 shadow-sm">
                <div class="card-header bg-primary text-white py-3">
                    <h2 class="h5 mb-0">Form Pemesanan Tiket</h2>
                </div>
                <div class="card-body p-4">
                    <form action="{{ route('pesan_tiket.store') }}" method="POST">
                        @csrf
                        
                        <div class="row g-3">
                            <!-- Left Column -->
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label for="nama_lengkap" class="form-label">Nama Lengkap</label>
                                    <input type="text" class="form-control" name="nama_lengkap" id="nama_lengkap" 
                                           value="{{ old('nama_lengkap', auth()->user()->name ?? '') }}" required>
                                    @error('nama_lengkap')
                                        <div class="invalid-feedback d-block">{{ $message }}</div>
                                    @enderror
                                </div>
                                
                                <div class="mb-3">
                                    <label for="no_identitas" class="form-label">No Identitas (KTP/SIM)</label>
                                    <input type="text" class="form-control" name="no_identitas" id="no_identitas" 
                                           value="{{ old('no_identitas') }}" required>
                                    @error('no_identitas')
                                        <div class="invalid-feedback d-block">{{ $message }}</div>
                                    @enderror
                                </div>
                                
                                <div class="mb-3">
                                    <label for="no_hp" class="form-label">No HP</label>
                                    <input type="text" class="form-control" name="no_hp" id="no_hp" 
                                           value="{{ old('no_hp') }}" required>
                                    @error('no_hp')
                                        <div class="invalid-feedback d-block">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                            
                            <!-- Right Column -->
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label for="destinasi_id" class="form-label">Nama Wisata</label>
                                    <select class="form-select" name="destinasi_id" id="destinasi_id" required>
                                        <option value="">-- Pilih Wisata --</option>
                                        @foreach($destinasis as $destinasi)
                                            <option value="{{ $destinasi->id }}" 
                                                    data-harga="{{ $destinasi->price }}" 
                                                    {{ old('destinasi_id') == $destinasi->id ? 'selected' : '' }}>
                                                {{ $destinasi->name }}
                                            </option>
                                        @endforeach
                                    </select>
                                    @error('destinasi_id')
                                        <div class="invalid-feedback d-block">{{ $message }}</div>
                                    @enderror
                                </div>
                                
                                <div class="mb-3">
                                    <label for="tanggal_kunjungan" class="form-label">Tanggal Kunjungan</label>
                                    <input type="date" class="form-control" name="tanggal_kunjungan" id="tanggal_kunjungan" 
                                           min="{{ date('Y-m-d') }}" 
                                           value="{{ old('tanggal_kunjungan') }}" required>
                                    @error('tanggal_kunjungan')
                                        <div class="invalid-feedback d-block">{{ $message }}</div>
                                    @enderror
                                </div>
                                
                               <div class="mb-3">
                                    <label for="jumlah_tiket" class="form-label">Jumlah Tiket</label>
                                    <input type="number" class="form-control" name="jumlah_tiket" id="jumlah_tiket" min="1" 
                                        value="{{ old('jumlah_tiket', 1) }}" required>
                                    @error('jumlah_tiket')
                                        <div class="invalid-feedback d-block">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                        </div>
                        
                        <!-- Price Summary -->
                        <div class="bg-light p-4 rounded-3 mt-4">
                            <h3 class="h5 text-primary mb-3">Ringkasan Pembayaran</h3>
                            <div class="row">
                                <div class="col-6">
                                    <p class="mb-2">Harga Tiket:</p>
                                </div>
                                <div class="col-6 text-end">
                                    <p id="harga-tiket" class="mb-2 fw-semibold">Rp 0</p>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-6">
                                    <p class="mb-2">Jumlah Tiket:</p>
                                </div>
                                <div class="col-6 text-end">
                                    <p id="jumlah-display" class="mb-2">0</p>
                                </div>
                            </div>
                            <hr class="my-2">
                            <div class="row">
                                <div class="col-6">
                                    <p class="mb-0 fw-semibold">Total Bayar:</p>
                                </div>
                                <div class="col-6 text-end">
                                    <p id="total-bayar" class="mb-0 fs-5 fw-bold text-primary">Rp 0</p>
                                </div>
                            </div>
                        </div>
                        
                        <div class="d-grid mt-4">
                            <button type="submit" class="btn btn-primary btn-lg">
                                <i class="bi bi-ticket-perforated me-2"></i> Pesan Tiket Sekarang
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        
        <!-- Help Section -->
        <div class="col-lg-4">
            <div class="card border-0 shadow-sm">
                <div class="card-header bg-primary text-white py-3">
                    <h2 class="h5 mb-0">Informasi Penting</h2>
                </div>
                <div class="card-body">
                    <div class="list-group list-group-flush">
                        <div class="list-group-item border-0 px-0 py-2">
                            <div class="d-flex align-items-start">
                                <i class="bi bi-info-circle-fill text-primary me-2 mt-1"></i>
                                <div>
                                    <h5 class="mb-1 h6">Pembayaran</h5>
                                    <p class="small text-muted mb-0">Pembayaran dapat dilakukan langsung di lokasi wisata atau melalui transfer bank.</p>
                                </div>
                            </div>
                        </div>
                        <div class="list-group-item border-0 px-0 py-2">
                            <div class="d-flex align-items-start">
                                <i class="bi bi-info-circle-fill text-primary me-2 mt-1"></i>
                                <div>
                                    <h5 class="mb-1 h6">Pembatalan</h5>
                                    <p class="small text-muted mb-0">Pembatalan dapat dilakukan maksimal H-1 sebelum tanggal kunjungan.</p>
                                </div>
                            </div>
                        </div>
                        <div class="list-group-item border-0 px-0 py-2">
                            <div class="d-flex align-items-start">
                                <i class="bi bi-info-circle-fill text-primary me-2 mt-1"></i>
                                <div>
                                    <h5 class="mb-1 h6">Persyaratan</h5>
                                    <p class="small text-muted mb-0">Harap membawa bukti identitas asli saat berkunjung.</p>
                                </div>
                            </div>
                        </div>
                    </div>
                    
                    <div class="mt-4 pt-3 border-top">
                        <h5 class="h6 mb-3">Butuh Bantuan?</h5>
                        <ul class="list-unstyled small">
                            <li class="mb-2">
                                <i class="bi bi-telephone-fill text-primary me-2"></i>
                                +62 812-3456-7890
                            </li>
                            <li class="mb-0">
                                <i class="bi bi-envelope-fill text-primary me-2"></i>
                                cs@wisatakita.com
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
    
    <!-- Destinations List -->
    <div class="mt-5 pt-5">
        <div class="text-center" style="margin-bottom: 100px">
            <h2 class="display-5 fw-bold text-primary mb-3">Destinasi Wisata Kami</h2>
            <p class="lead text-muted mx-auto" style="max-width: 700px;">Temukan berbagai pilihan destinasi wisata menarik untuk dikunjungi</p>
>>>>>>> 7a8a929 (pesanan baruuuu)
        </div>

        <div class="row g-4">
            <!-- Booking Form -->
            <div class="col-lg-8">
                <div class="card border-0 shadow-sm">
                    <div class="card-header bg-primary text-white py-3">
                        <h2 class="h5 mb-0">Form Pemesanan Tiket</h2>
                    </div>
                    <div class="card-body p-4">
                        <form action="{{ route('pesan_tiket.store') }}" method="POST">
                            @csrf

                            <div class="row g-3">
                                <!-- Left Column -->
                                <div class="col-md-6">
                                    <div class="mb-3">
                                        <label for="nama_lengkap" class="form-label">Nama Lengkap</label>
                                        <input type="text" class="form-control" name="nama_lengkap" id="nama_lengkap"
                                            value="{{ old('nama_lengkap', auth()->user()->name ?? '') }}" required>
                                        @error('nama_lengkap')
                                            <div class="invalid-feedback d-block">{{ $message }}</div>
                                        @enderror
                                    </div>

                                    <div class="mb-3">
                                        <label for="no_identitas" class="form-label">No Identitas (KTP/SIM)</label>
                                        <input type="text" class="form-control" name="no_identitas" id="no_identitas"
                                            value="{{ old('no_identitas') }}" required>
                                        @error('no_identitas')
                                            <div class="invalid-feedback d-block">{{ $message }}</div>
                                        @enderror
                                    </div>

                                    <div class="mb-3">
                                        <label for="no_hp" class="form-label">No HP</label>
                                        <input type="text" class="form-control" name="no_hp" id="no_hp"
                                            value="{{ old('no_hp') }}" required>
                                        @error('no_hp')
                                            <div class="invalid-feedback d-block">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>

                                <!-- Right Column -->
                                <div class="col-md-6">
                                    <div class="mb-3">
                                        <label for="destinasi_id" class="form-label">Nama Wisata</label>
                                        <select class="form-select" name="destinasi_id" id="destinasi_id" required>
                                            <option value="">-- Pilih Wisata --</option>
                                            @foreach ($destinasis as $destinasi)
                                                <option value="{{ $destinasi->id }}" data-harga="{{ $destinasi->price }}"
                                                    {{ old('destinasi_id') == $destinasi->id ? 'selected' : '' }}>
                                                    {{ $destinasi->name }}
                                                </option>
                                            @endforeach
                                        </select>
                                        @error('destinasi_id')
                                            <div class="invalid-feedback d-block">{{ $message }}</div>
                                        @enderror
                                    </div>

                                    <div class="mb-3">
                                        <label for="tanggal_kunjungan" class="form-label">Tanggal Kunjungan</label>
                                        <input type="date" class="form-control" name="tanggal_kunjungan"
                                            id="tanggal_kunjungan" min="{{ date('Y-m-d') }}"
                                            value="{{ old('tanggal_kunjungan') }}" required>
                                        @error('tanggal_kunjungan')
                                            <div class="invalid-feedback d-block">{{ $message }}</div>
                                        @enderror
                                    </div>

                                    <div class="mb-3">
                                        <label for="jumlah_tiket" class="form-label">Jumlah Tiket</label>
                                        <input type="number" class="form-control" name="jumlah_tiket" id="jumlah_tiket"
                                            min="1" value="{{ old('jumlah_tiket', 1) }}" required>
                                        @error('jumlah_tiket')
                                            <div class="invalid-feedback d-block">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                            </div>

                            <!-- Price Summary -->
                            <div class="bg-light p-4 rounded-3 mt-4">
                                <h3 class="h5 text-primary mb-3">Ringkasan Pembayaran</h3>
                                <div class="row">
                                    <div class="col-6">
                                        <p class="mb-2">Harga Tiket:</p>
                                    </div>
                                    <div class="col-6 text-end">
                                        <p id="harga-tiket" class="mb-2 fw-semibold">Rp 0</p>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-6">
                                        <p class="mb-2">Jumlah Tiket:</p>
                                    </div>
                                    <div class="col-6 text-end">
                                        <p id="jumlah-display" class="mb-2">0</p>
                                    </div>
                                </div>
                                <hr class="my-2">
                                <div class="row">
                                    <div class="col-6">
                                        <p class="mb-0 fw-semibold">Total Bayar:</p>
                                    </div>
                                    <div class="col-6 text-end">
                                        <p id="total-bayar" class="mb-0 fs-5 fw-bold text-primary">Rp 0</p>
                                    </div>
                                </div>
                            </div>

                            <div class="d-grid mt-4">
                                <button type="submit" class="btn btn-primary btn-lg">
                                    <i class="bi bi-ticket-perforated me-2"></i> Pesan Tiket Sekarang
                                </button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>

            <!-- Help Section -->
            <div class="col-lg-4">
                <div class="card border-0 shadow-sm">
                    <div class="card-header bg-primary text-white py-3">
                        <h2 class="h5 mb-0">Informasi Penting</h2>
                    </div>
                    <div class="card-body">
                        <div class="list-group list-group-flush">
                            <div class="list-group-item border-0 px-0 py-2">
                                <div class="d-flex align-items-start">
                                    <i class="bi bi-info-circle-fill text-primary me-2 mt-1"></i>
                                    <div>
                                        <h5 class="mb-1 h6">Pembayaran</h5>
                                        <p class="small text-muted mb-0">Pembayaran dapat dilakukan langsung di lokasi
                                            wisata atau melalui transfer bank.</p>
                                    </div>
                                </div>
                            </div>
                            <div class="list-group-item border-0 px-0 py-2">
                                <div class="d-flex align-items-start">
                                    <i class="bi bi-info-circle-fill text-primary me-2 mt-1"></i>
                                    <div>
                                        <h5 class="mb-1 h6">Pembatalan</h5>
                                        <p class="small text-muted mb-0">Pembatalan dapat dilakukan maksimal H-1 sebelum
                                            tanggal kunjungan.</p>
                                    </div>
                                </div>
                            </div>
                            <div class="list-group-item border-0 px-0 py-2">
                                <div class="d-flex align-items-start">
                                    <i class="bi bi-info-circle-fill text-primary me-2 mt-1"></i>
                                    <div>
                                        <h5 class="mb-1 h6">Persyaratan</h5>
                                        <p class="small text-muted mb-0">Harap membawa bukti identitas asli saat
                                            berkunjung.</p>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="mt-4 pt-3 border-top">
                            <h5 class="h6 mb-3">Butuh Bantuan?</h5>
                            <ul class="list-unstyled small">
                                <li class="mb-2">
                                    <i class="bi bi-telephone-fill text-primary me-2"></i>
                                    +62 812-3456-7890
                                </li>
                                <li class="mb-0">
                                    <i class="bi bi-envelope-fill text-primary me-2"></i>
                                    cs@wisatakita.com
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Destinations List -->
        <div class="mt-5 pt-5">
            <div class="text-center mb-5">
                <h2 class="display-5 fw-bold text-primary mb-3">Destinasi Wisata Kami</h2>
                <p class="lead text-muted mx-auto" style="max-width: 700px;">Temukan berbagai pilihan destinasi wisata
                    menarik untuk dikunjungi</p>
            </div>

            <div class="row g-4">
                @foreach ($destinasis as $destinasi)
                    <div class="col-md-6 col-lg-4">
                        <div class="card h-100 border-0 shadow-sm overflow-hidden">
                            <div class="position-relative overflow-hidden" style="height: 200px;">
                                @if ($destinasi->image)
                                    <img src="{{ asset('storage/' . $destinasi->image) }}"
                                        class="card-img-top h-100 object-cover" alt="{{ $destinasi->nama_destinasi }}">
                                @else
                                    <div class="h-100 d-flex align-items-center justify-content-center bg-light">
                                        <i class="bi bi-image text-muted" style="font-size: 3rem;"></i>
                                    </div>
                                @endif
                                <div class="position-absolute bottom-0 start-0 end-0 p-3"
                                    style="background: linear-gradient(to top, rgba(0,0,0,0.7), transparent);">
                                    <h5 class="text-white mb-1">{{ $destinasi->name }}</h5>
                                    <p class="text-warning mb-0">Rp {{ number_format($destinasi->price, 0, ',', '.') }} /
                                        tiket</p>
                                </div>
                            </div>
                            <div class="card-body">
                                <p class="card-text text-muted mb-3">{{ Str::limit($destinasi->description, 120) }}</p>
                                <div class="d-flex justify-content-between align-items-center">
                                    <a href="#destinasi_id"
                                        onclick="document.getElementById('destinasi_id').value='{{ $destinasi->id }}'; document.getElementById('destinasi_id').dispatchEvent(new Event('change'));"
                                        class="btn btn-sm btn-outline-primary">
                                        Pesan Sekarang <i class="bi bi-arrow-right ms-1"></i>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>

    <!-- Bootstrap Icons -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.0/font/bootstrap-icons.css">
    <!-- Hapus bagian yang terkait kuota -->
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const destinasiSelect = document.getElementById('destinasi_id');
            const jumlahTiketInput = document.getElementById('jumlah_tiket');
            const hargaTiketSpan = document.getElementById('harga-tiket');
            const jumlahDisplay = document.getElementById('jumlah-display');
            const totalBayarSpan = document.getElementById('total-bayar');

            function calculateTotal() {
                const selectedOption = destinasiSelect.options[destinasiSelect.selectedIndex];
                const harga = selectedOption ? parseFloat(selectedOption.dataset.harga) : 0;
                const jumlahTiket = parseInt(jumlahTiketInput.value) || 0;
                const total = harga * jumlahTiket;

                hargaTiketSpan.textContent = 'Rp ' + harga.toLocaleString('id-ID');
                jumlahDisplay.textContent = jumlahTiket;
                totalBayarSpan.textContent = 'Rp ' + total.toLocaleString('id-ID');
            }

            destinasiSelect.addEventListener('change', calculateTotal);
            jumlahTiketInput.addEventListener('input', calculateTotal);
            calculateTotal();
        });
    </script>
@endsection
