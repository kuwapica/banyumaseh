@extends('layouts.app')

@section('title', 'Daftar Pesanan')

@section('content')
    <div class="max-w-7xl mx-auto">
        <h1 class="text-3xl font-bold text-blue-600 mb-8">Daftar Pesanan Tiket</h1>

        @if (session('success'))
            <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded mb-6">
                {{ session('success') }}
            </div>
        @endif

        @if (session('error'))
            <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded mb-6">
                {{ session('error') }}
            </div>
        @endif

        <div class="bg-white rounded-lg shadow-md overflow-hidden">
            <div class="overflow-x-auto">
                <table class="min-w-full divide-y divide-gray-200">
                    <thead class="bg-gray-50">
                        <tr>
                            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Kode
                                Booking</th>
                            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Nama
                                Pemesan</th>
                            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                Destinasi</th>
                            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                Tanggal Kunjungan</th>
                            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                Jumlah Tiket</th>
                            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Harga
                                Tiket</th>
                            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Total
                                Bayar</th>
                            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                Status</th>
                            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Aksi
                            </th>
                        </tr>
                    </thead>
                    <tbody class="bg-white divide-y divide-gray-200">
                        @forelse($pesanans as $pesanan)
                            <tr>
                                <td class="px-6 py-4 whitespace-nowrap font-mono font-bold">{{ $pesanan->kode_booking }}
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap">{{ $pesanan->nama_lengkap }}</td>
                                <td class="px-6 py-4 whitespace-nowrap">{{ $pesanan->destinasi->nama_destinasi }}</td>
                                <td class="px-6 py-4 whitespace-nowrap">
                                    {{ \Carbon\Carbon::parse($pesanan->tanggal_kunjungan)->format('d M Y') }}</td>
                                <td class="px-6 py-4 whitespace-nowrap">{{ $pesanan->jumlah_tiket }}</td>
                                <td class="px-6 py-4 whitespace-nowrap">Rp
                                    {{ number_format($pesanan->harga_tiket, 0, ',', '.') }}</td>
                                <td class="px-6 py-4 whitespace-nowrap">Rp
                                    {{ number_format($pesanan->total_bayar, 0, ',', '.') }}</td>
                                <td class="px-6 py-4 whitespace-nowrap">
                                    <span
                                        class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full 
                                    {{ $pesanan->status === 'confirmed'
                                        ? 'bg-green-100 text-green-800'
                                        : ($pesanan->status === 'pending'
                                            ? 'bg-yellow-100 text-yellow-800'
                                            : 'bg-red-100 text-red-800') }}">
                                        {{ ucfirst($pesanan->status) }}
                                    </span>
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap">
                                    @if ($pesanan->status === 'pending')
                                        <form action="{{ route('pesanan.cancel', $pesanan->id) }}" method="POST"
                                            class="inline">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit"
                                                class="text-red-600 hover:text-red-900 text-sm font-medium"
                                                onclick="return confirm('Yakin ingin membatalkan pesanan?')">
                                                Batalkan
                                            </button>
                                        </form>
                                    @else
                                        <span class="text-gray-400 text-sm">-</span>
                                    @endif
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="9" class="px-6 py-4 text-center text-gray-500">Belum ada pesanan</td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection
