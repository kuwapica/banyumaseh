@extends('layouts.admin')

@section('title', 'Detail Pesanan')
@section('main')
    <div class="container-fluid">
        <!-- Page Heading -->
        <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800">Detail Pesanan</h1>
            <a href="{{ route('pesanan.index') }}" class="d-none d-sm-inline-block btn btn-sm btn-secondary shadow-sm">
                <i class="fas fa-arrow-left fa-sm text-white-50"></i> Kembali
            </a>
        </div>

        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">Informasi Pesanan</h6>
            </div>
            <div class="card-body">
                <div class="row">
                    <div class="col-md-6">
                        <h5>Data Pemesan</h5>
                        <table class="table table-bordered">
                            <tr>
                                <th width="30%">Kode Booking</th>
                                <td>{{ $pesanan->kode_booking }}</td>
                            </tr>
                            <tr>
                                <th>Nama Lengkap</th>
                                <td>{{ $pesanan->nama_lengkap }}</td>
                            </tr>
                            <tr>
                                <th>No Identitas</th>
                                <td>{{ $pesanan->no_identitas }}</td>
                            </tr>
                            <tr>
                                <th>No HP</th>
                                <td>{{ $pesanan->no_hp }}</td>
                            </tr>
                        </table>
                    </div>
                    <div class="col-md-6">
                        <h5>Detail Pesanan</h5>
                        <table class="table table-bordered">
                            <tr>
                                <th width="30%">Destinasi</th>
                                <td>{{ $pesanan->destinasi->name }}</td>
                            </tr>
                            <tr>
                                <th>Tanggal Kunjungan</th>
                                <td>{{ \Carbon\Carbon::parse($pesanan->tanggal_kunjungan)->format('d M Y') }}</td>
                            </tr>
                            <tr>
                                <th>Jumlah Tiket</th>
                                <td>{{ $pesanan->jumlah_tiket }}</td>
                            </tr>
                            <tr>
                                <th>Harga Tiket</th>
                                <td>{{ 'Rp ' . number_format($pesanan->harga_tiket, 0, ',', '.') }}</td>
                            </tr>
                            <tr>
                                <th>Total Bayar</th>
                                <td>{{ 'Rp ' . number_format($pesanan->total_bayar, 0, ',', '.') }}</td>
                            </tr>
                            <tr>
                                <th>Status</th>
                                <td>
                                    <span class="status-badge status-{{ $pesanan->status }}">
                                        {{ strtoupper($pesanan->status) }}
                                    </span>
                                </td>
                            </tr>
                        </table>
                    </div>
                </div>

                @if ($pesanan->bukti_pembayaran)
                    <div class="row mt-4">
                        <div class="col-md-12">
                            <h5>Bukti Pembayaran</h5>
                            <img src="{{ asset('storage/' . $pesanan->bukti_pembayaran) }}" class="img-fluid"
                                style="max-height: 400px;">
                        </div>
                    </div>
                @endif

                @if (in_array($pesanan->status, ['pending', 'waiting_verification']))
                    <div class="row mt-4">
                        <div class="col-md-12">
                            <form action="{{ route('admin.pesanan.updateStatus', $pesanan->id) }}" method="POST"
                                class="d-inline">
                                @csrf
                                @method('PATCH')
                                <input type="hidden" name="status" value="confirmed">
                                <button type="submit" class="btn btn-success"
                                    onclick="return confirm('Konfirmasi pesanan ini?')">
                                    <i class="fas fa-check"></i> Konfirmasi Pembayaran
                                </button>
                            </form>
                            <form action="{{ route('admin.pesanan.updateStatus', $pesanan->id) }}" method="POST"
                                class="d-inline">
                                @csrf
                                @method('PATCH')
                                <input type="hidden" name="status" value="canceled">
                                <button type="submit" class="btn btn-danger"
                                    onclick="return confirm('Batalkan pesanan ini?')">
                                    <i class="fas fa-times"></i> Batalkan Pesanan
                                </button>
                            </form>
                        </div>
                    </div>
                @endif
            </div>
        </div>
    </div>
@endsection

@push('styles')
    <style>
        .status-badge {
            padding: 5px 10px;
            border-radius: 20px;
            font-size: 12px;
            font-weight: 600;
        }

        .status-pending {
            background-color: #fff3cd;
            color: #856404;
        }

        .status-confirmed {
            background-color: #d4edda;
            color: #155724;
        }

        .status-canceled {
            background-color: #f8d7da;
            color: #721c24;
        }
    </style>
@endpush
