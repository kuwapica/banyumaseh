@extends('layouts.admin')

@section('title', 'Dashboard Admin - Pesanan')
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

@section('main')
    <!-- Begin Page Content -->
    <div class="container-fluid">

        <!-- Page Heading -->
        <h1 class="h3 mb-2 text-gray-800">Daftar Pesanan</h1>
        <p class="mb-4">Berisi data-data pemesanan tiket wisata.</p>

        <!-- DataTales Example -->
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">Data Pesanan</h6>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                        <thead>
                            <tr>
                                <th>Kode Booking</th>
                                <th>Bukti Pembayaran</th>
                                <th>Nama Pemesan</th>
                                <th>Destinasi</th>
                                <th>Tanggal Kunjungan</th>
                                <th>Jumlah Tiket</th>
                                <th>Total Bayar</th>
                                <th>Status</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($pesanans as $pesanan)
                                <tr>
                                    <td>{{ $pesanan->kode_booking }}</td>
                                    <td>{{ $pesanan->bukti_pembayaran }}</td>
                                    <td>{{ $pesanan->nama_lengkap }}</td>
                                    <td>{{ $pesanan->destinasi->name }}</td>
                                    <td>{{ \Carbon\Carbon::parse($pesanan->tanggal_kunjungan)->format('d M Y') }}</td>
                                    <td>{{ $pesanan->jumlah_tiket }}</td>
                                    <td>{{ 'Rp ' . number_format($pesanan->total_bayar, 0, ',', '.') }}</td>
                                    <td>
                                        <span class="status-badge status-{{ $pesanan->status }}">
                                            {{ strtoupper($pesanan->status) }}
                                        </span>
                                    </td>
                                    <td>
                                        <a href="{{ route('admin.pesanan.show', $pesanan->id) }}"
                                            class="btn btn-sm btn-info">
                                            <i class="fas fa-eye"></i>
                                        </a>
                                        @if ($pesanan->status == 'pending')
                                            <form action="{{ route('admin.pesanan.updateStatus', $pesanan->id) }}"
                                                method="POST" class="d-inline">
                                                @csrf
                                                @method('PATCH')
                                                <input type="hidden" name="status" value="confirmed">
                                                <button type="submit" class="btn btn-sm btn-success"
                                                    onclick="return confirm('Konfirmasi pesanan ini?')">
                                                    <i class="fas fa-check"></i>
                                                </button>
                                            </form>
                                            <form action="{{ route('admin.pesanan.updateStatus', $pesanan->id) }}"
                                                method="POST" class="d-inline">
                                                @csrf
                                                @method('PATCH')
                                                <input type="hidden" name="status" value="canceled">
                                                <button type="submit" class="btn btn-sm btn-danger"
                                                    onclick="return confirm('Batalkan pesanan ini?')">
                                                    <i class="fas fa-times"></i>
                                                </button>
                                            </form>
                                        @endif
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="8" class="text-center">Tidak ada data pesanan</td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                    {{ $pesanans->links() }}
                </div>
            </div>
        </div>

    </div>
    <!-- /.container-fluid -->
@endsection

@push('scripts')
    <!-- Page level plugins -->
    <script src="{{ asset('vendor/datatables/jquery.dataTables.min.js') }}"></script>
    <script src="{{ asset('vendor/datatables/dataTables.bootstrap4.min.js') }}"></script>

    <!-- Page level custom scripts -->
    <script>
        $(document).ready(function() {
            if ($.fn.DataTable.isDataTable('#dataTable')) {
                $('#dataTable').DataTable().destroy();
            }

            $('#dataTable').DataTable({
                paging: false, // Nonaktifkan pagination karena sudah pakai Laravel
                searching: false, // Nonaktifkan searching jika tidak perlu
                info: false, // Nonaktifkan info "Showing 1 to x of y"
                ordering: true, // Aktifkan jika ingin sorting tetap ada
                language: {
                    url: "//cdn.datatables.net/plug-ins/1.10.20/i18n/Indonesian.json"
                }
            });
        });
    </script>
@endpush
