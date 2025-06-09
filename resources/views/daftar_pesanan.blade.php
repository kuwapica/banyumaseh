@extends('layouts.app')

@section('title', 'Daftar Pesanan')

@section('content')
<div class="container py-4">
    <h3>Daftar Pesanan Saya</h3>

    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @elseif(session('error'))
        <div class="alert alert-danger">{{ session('error') }}</div>
    @endif

    <table class="table table-bordered">
        <thead>
            <tr>
                <th>Kode Booking</th>
                <th>Destinasi</th>
                <th>Tanggal</th>
                <th>Jumlah Tiket</th>
                <th>Total Bayar</th>
                <th>Status</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            @foreach($pesanans as $pesanan)
                <tr>
                    <td>{{ $pesanan->kode_booking }}</td>
                    <td>{{ $pesanan->destinasi->name }}</td>
                    <td>{{ $pesanan->tanggal_kunjungan }}</td>
                    <td>{{ $pesanan->jumlah_tiket }}</td>
                    <td>Rp {{ number_format($pesanan->total_bayar, 0, ',', '.') }}</td>
                    <td>{{ ucfirst($pesanan->status) }}</td>
                    <td>
                        @if($pesanan->status == 'pending')
                            <form action="{{ route('pesanan.cancel', $pesanan->id) }}" method="POST" onsubmit="return confirm('Yakin batalkan?')">
                                @csrf
                                @method('PATCH')
                                <button class="btn btn-danger btn-sm">Batalkan</button>
                            </form>
                        @else
                            
                        @endif
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
