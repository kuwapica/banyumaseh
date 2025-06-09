@extends('layouts.app')

@section('title', 'Daftar Pesanan')

@section('content')
<div class="container py-4">
    
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h3 class="mb-0">Daftar Pesanan Saya</h3>
        
        <a href="{{ route('pesan_tiket') }}" class="btn btn-primary">
            <i class="fas fa-plus me-2"></i> Pesan Tiket Baru
        </a>
    </div>

    @if(session('success'))
        <div class="alert alert-success alert-dismissible fade show">
            {{ session('success') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    @elseif(session('error'))
        <div class="alert alert-danger alert-dismissible fade show">
            {{ session('error') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    @endif

    <div class="row g-4">
        @forelse($pesanans as $pesanan)
        <div class="col-md-6 col-lg-4">
            <div class="card shadow-sm h-100">
                <div class="card-header bg-primary text-white">
                    <div class="d-flex justify-content-between align-items-center">
                        <h5 class="mb-0">{{ $pesanan->destinasi->name }}</h5>
                        <span class="badge bg-{{ $pesanan->status == 'pending' ? 'warning' : ($pesanan->status == 'confirmed' ? 'success' : 'danger') }}">
                            {{ ucfirst($pesanan->status) }}
                        </span>
                    </div>
                </div>
                <div class="card-body">
                    <div class="mb-3">
                        <h6 class="text-muted mb-1">Kode Booking</h6>
                        <p class="fw-bold">{{ $pesanan->kode_booking }}</p>
                    </div>
                    
                    <div class="row">
                        <div class="col-6 mb-3">
                            <h6 class="text-muted mb-1">Tanggal Kunjungan</h6>
                            <p>{{ $pesanan->tanggal_kunjungan->format('d M Y') }}</p>
                        </div>
                        <div class="col-6 mb-3">
                            <h6 class="text-muted mb-1">Jumlah Tiket</h6>
                            <p>{{ $pesanan->jumlah_tiket }} orang</p>
                        </div>
                    </div>
                    
                    <div class="mb-3">
                        <h6 class="text-muted mb-1">Total Pembayaran</h6>
                        <h5 class="text-primary">Rp {{ number_format($pesanan->total_bayar, 0, ',', '.') }}</h5>
                    </div>

                    <div class="mb-3 mt-4">
                        <h6 class="text-muted mb-1">Transfer ke Rekening</h6>
                        <div class="border rounded p-3 bg-light">
                            <p class="mb-1"><strong>Bank BCA</strong></p>
                            <p class="mb-1">No. Rekening: <strong>1234567890</strong></p>
                            <p class="mb-0">a.n <strong>PT. Wisata Banyumas</strong></p>
                        </div>
                    </div>
                    
                    @if($pesanan->status == 'pending')
                    <div class="border-top pt-3">
                        <form action="{{ route('pesanan.cancel', $pesanan->id) }}" method="POST" class="d-inline">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-outline-danger btn-sm" 
                                onclick="return confirm('Yakin ingin membatalkan pesanan?')">
                                <i class="fas fa-times me-1"></i> Batalkan
                            </button>
                        </form>
                        
                        <button type="button" class="btn btn-primary btn-sm" data-bs-toggle="modal" 
                            data-bs-target="#uploadModal{{ $pesanan->id }}">
                            <i class="fas fa-upload me-1"></i> Upload Bukti
                        </button>
                    </div>
                    @endif
                </div>
            </div>
        </div>

        <!-- Modal Upload Bukti Pembayaran -->
        <div class="modal fade" id="uploadModal{{ $pesanan->id }}" tabindex="-1" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">Upload Bukti Pembayaran</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <form action="{{ route('pesanan.upload_bukti', $pesanan->id) }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="modal-body">
                            <div class="mb-3">
                                <label for="bukti_pembayaran" class="form-label">File Bukti Pembayaran</label>
                                <input type="file" class="form-control" id="bukti_pembayaran" name="bukti_pembayaran" required>
                                <small class="text-muted">Format: JPG/PNG/PDF (max: 2MB)</small>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Tutup</button>
                            <button type="submit" class="btn btn-primary">Upload</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        @empty
        <div class="col-12">
            <div class="card shadow-sm">
                <div class="card-body text-center py-5">
                    <i class="fas fa-ticket-alt fa-3x text-muted mb-3"></i>
                    <h4>Belum ada pesanan</h4>
                    <p class="text-muted">Anda belum melakukan pemesanan tiket wisata</p>
                    <a href="{{ route('pesan_tiket') }}" class="btn btn-primary">
                        <i class="fas fa-plus me-2"></i> Pesan Tiket Sekarang
                    </a>
                </div>
            </div>
        </div>
        @endforelse
    </div>
</div>
@endsection