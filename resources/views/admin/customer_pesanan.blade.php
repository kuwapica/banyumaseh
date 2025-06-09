@extends('layouts.admin')
@extends('layouts.app')

@section('content')
<div class="container">
    <h3>Semua Pesanan Tiket</h3>

    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <table class="table table-bordered">
        <thead>
            <tr>
                <th>Kode Booking</th>
                <th>Nama</th>
                <th>Destinasi</th>
                <th>Tanggal</th>
                <th>Jumlah</th>
                <th>Total Bayar</th>
                <th>Status</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            @foreach($pesanans as $pesanan)
                <tr>
                    <td>{{ $pesanan->kode_booking }}</td>
                    <td>{{ $pesanan->nama_lengkap }}</td>
                    <td>{{ $pesanan->destinasi->name }}</td>
                    <td>{{ $pesanan->tanggal_kunjungan }}</td>
                    <td>{{ $pesanan->jumlah_tiket }}</td>
                    <td>Rp {{ number_format($pesanan->total_bayar, 0, ',', '.') }}</td>
                    <td>{{ ucfirst($pesanan->status) }}</td>
                    <td>
                        <a href="{{ route('admin.pesanan.show', $pesanan->id) }}" class="btn btn-info btn-sm">Detail</a>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
