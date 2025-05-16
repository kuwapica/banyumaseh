@extends('layouts.app')

@section('title', 'Pesan Tiket Wisata')

@section('content')
<div class="max-w-7xl mx-auto">
    <h1 class="text-3xl font-bold text-blue-600 mb-8">Form Pemesanan Tiket Wisata</h1>
    
    <div class="bg-white rounded-lg shadow-md p-6">
        <form action="{{ route('pesan_tiket.store') }}" method="POST">
            @csrf
            
            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                <!-- Kolom Kiri -->
                <div>
                    <div class="mb-4">
                        <label for="nama_lengkap" class="block text-gray-700 font-medium mb-2">Nama Lengkap</label>
                        <input type="text" name="nama_lengkap" id="nama_lengkap" 
                               class="w-full px-4 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500"
                               value="{{ old('nama_lengkap', auth()->user()->name ?? '') }}" required>
                        @error('nama_lengkap')
                            <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                        @enderror
                    </div>
                    
                    <div class="mb-4">
                        <label for="no_identitas" class="block text-gray-700 font-medium mb-2">No Identitas (KTP/SIM)</label>
                        <input type="text" name="no_identitas" id="no_identitas" 
                               class="w-full px-4 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500"
                               value="{{ old('no_identitas') }}" required>
                        @error('no_identitas')
                            <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                        @enderror
                    </div>
                    
                    <div class="mb-4">
                        <label for="no_hp" class="block text-gray-700 font-medium mb-2">No HP</label>
                        <input type="text" name="no_hp" id="no_hp" 
                               class="w-full px-4 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500"
                               value="{{ old('no_hp') }}" required>
                        @error('no_hp')
                            <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                        @enderror
                    </div>
                </div>
                
                <!-- Kolom Kanan -->
                <div>
                    <div class="mb-4">
                        <label for="destinasi_id" class="block text-gray-700 font-medium mb-2">Nama Wisata</label>
                        <select name="destinasi_id" id="destinasi_id" 
                                class="w-full px-4 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500" required>
                            <option value="">-- Pilih Wisata --</option>
                            @foreach($destinasis as $destinasi)
                                <option value="{{ $destinasi->id }}" 
                                        data-harga="{{ $destinasi->harga }}" 
                                        data-kuota="{{ $destinasi->kuota }}"
                                        {{ old('destinasi_id') == $destinasi->id ? 'selected' : '' }}>
                                    {{ $destinasi->nama_destinasi }} (Rp {{ number_format($destinasi->harga, 0, ',', '.') }})
                                </option>
                            @endforeach
                        </select>
                        @error('destinasi_id')
                            <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                        @enderror
                    </div>
                    
                    <div class="mb-4">
                        <label for="tanggal_kunjungan" class="block text-gray-700 font-medium mb-2">Tanggal Kunjungan</label>
                        <input type="date" name="tanggal_kunjungan" id="tanggal_kunjungan" 
                               class="w-full px-4 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500"
                               min="{{ date('Y-m-d') }}" 
                               value="{{ old('tanggal_kunjungan') }}" required>
                        @error('tanggal_kunjungan')
                            <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                        @enderror
                    </div>
                    
                    <div class="mb-4">
                        <label for="jumlah_tiket" class="block text-gray-700 font-medium mb-2">Jumlah Tiket</label>
                        <input type="number" name="jumlah_tiket" id="jumlah_tiket" min="1" 
                               class="w-full px-4 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500"
                               value="{{ old('jumlah_tiket', 1) }}" required>
                        <p id="kuota-info" class="text-sm text-gray-500 mt-1"></p>
                        @error('jumlah_tiket')
                            <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                        @enderror
                    </div>
                </div>
            </div>
            
            <!-- Informasi Harga -->
            <div class="mt-6 p-4 bg-gray-50 rounded-lg">
                <div class="flex justify-between items-center mb-2">
                    <span class="text-gray-700">Harga Tiket:</span>
                    <span id="harga-tiket" class="font-semibold">Rp 0</span>
                </div>
                <div class="flex justify-between items-center">
                    <span class="text-gray-700 font-medium">Total Bayar:</span>
                    <span id="total-bayar" class="text-xl font-bold text-blue-600">Rp 0</span>
                </div>
            </div>
            
            <div class="mt-6 flex justify-end">
                <button type="submit" class="bg-blue-600 hover:bg-blue-700 text-white font-bold py-3 px-8 rounded-lg transition duration-200 flex items-center">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-2" viewBox="0 0 20 20" fill="currentColor">
                        <path d="M4 4a2 2 0 00-2 2v1h16V6a2 2 0 00-2-2H4z" />
                        <path fill-rule="evenodd" d="M18 9H2v5a2 2 0 002 2h12a2 2 0 002-2V9zM4 13a1 1 0 011-1h1a1 1 0 110 2H5a1 1 0 01-1-1zm5-1a1 1 0 100 2h1a1 1 0 100-2H9z" clip-rule="evenodd" />
                    </svg>
                    Pesan Tiket
                </button>
            </div>
        </form>
    </div>
    
    <!-- Daftar Destinasi -->
    <div class="mt-12">
        <h2 class="text-2xl font-bold text-blue-600 mb-6">Daftar Destinasi Wisata</h2>
        
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
            @foreach($destinasis as $destinasi)
                <div class="bg-white rounded-lg shadow-md overflow-hidden hover:shadow-lg transition-shadow duration-300">
                    <div class="h-48 bg-gray-200 overflow-hidden">
                        @if($destinasi->gambar)
                            <img src="{{ asset('storage/' . $destinasi->gambar) }}" alt="{{ $destinasi->nama_destinasi }}" class="w-full h-full object-cover">
                        @else
                            <div class="w-full h-full flex items-center justify-center text-gray-400">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-16 w-16" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z" />
                                </svg>
                            </div>
                        @endif
                    </div>
                    <div class="p-4">
                        <h3 class="text-xl font-bold text-gray-800">{{ $destinasi->nama_destinasi }}</h3>
                        <p class="text-blue-600 font-semibold mt-1">Rp {{ number_format($destinasi->harga, 0, ',', '.') }} / tiket</p>
                        <p class="text-gray-600 mt-2 line-clamp-2">{{ $destinasi->deskripsi }}</p>
                        <div class="mt-3 flex justify-between items-center">
                            <span class="text-sm text-gray-500">Kuota: {{ $destinasi->kuota }}</span>
                            <a href="#form-pesan" class="text-blue-500 hover:text-blue-700 text-sm font-medium">Pesan Sekarang</a>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</div>

<script>
    document.addEventListener('DOMContentLoaded', function() {
        const destinasiSelect = document.getElementById('destinasi_id');
        const jumlahTiketInput = document.getElementById('jumlah_tiket');
        const hargaTiketSpan = document.getElementById('harga-tiket');
        const totalBayarSpan = document.getElementById('total-bayar');
        const kuotaInfo = document.getElementById('kuota-info');
        
        function calculateTotal() {
            const selectedOption = destinasiSelect.options[destinasiSelect.selectedIndex];
            const harga = selectedOption ? parseFloat(selectedOption.dataset.harga) : 0;
            const jumlahTiket = parseInt(jumlahTiketInput.value) || 0;
            const total = harga * jumlahTiket;
            
            hargaTiketSpan.textContent = 'Rp ' + harga.toLocaleString('id-ID');
            totalBayarSpan.textContent = 'Rp ' + total.toLocaleString('id-ID');
            
            if (selectedOption) {
                const kuota = parseInt(selectedOption.dataset.kuota);
                kuotaInfo.textContent = `Kuota tersedia: ${kuota}`;
                
                if (jumlahTiket > kuota) {
                    kuotaInfo.classList.add('text-red-500');
                    kuotaInfo.classList.remove('text-green-500');
                } else {
                    kuotaInfo.classList.add('text-green-500');
                    kuotaInfo.classList.remove('text-red-500');
                }
            }
        }
        
        destinasiSelect.addEventListener('change', calculateTotal);
        jumlahTiketInput.addEventListener('input', calculateTotal);
        
        // Initialize calculation
        calculateTotal();
    });
</script>
@endsection
