<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Destinasi;
use App\Models\Pesanan;
use Illuminate\Support\Str;

class PesananController extends Controller
{
    public function index()
    {
        $destinasis = Destinasi::all();
        return view('pesan_tiket', compact('destinasis'));
    }
    
    public function store(Request $request)
{
    $request->validate([
        'nama_lengkap' => 'required|string',
        'no_identitas' => 'required|string',
        'no_hp' => 'required|string',
        'destinasi_id' => 'required|exists:destinasis,id',
        'tanggal_kunjungan' => 'required|date',
        'jumlah_tiket' => 'required|integer|min:1',
    ]);

    // Ambil data destinasi untuk dapatkan harga tiket
    $destinasi = Destinasi::findOrFail($request->destinasi_id);
    $harga_tiket = $destinasi->price;
    $total_bayar = $harga_tiket * $request->jumlah_tiket;

    // Generate kode booking unik
    $kode_booking = strtoupper(Str::random(8));

    Pesanan::create([
        'user_id' => auth()->id(),
        'destinasi_id' => $request->destinasi_id,
        'nama_lengkap' => $request->nama_lengkap,
        'no_identitas' => $request->no_identitas,
        'no_hp' => $request->no_hp,
        'tanggal_kunjungan' => $request->tanggal_kunjungan,
        'jumlah_tiket' => $request->jumlah_tiket,
        'harga_tiket' => $harga_tiket,
        'total_bayar' => $total_bayar,
        'kode_booking' => $kode_booking,
        'status' => 'pending',
    ]);

    return redirect()->route('daftar_pesanan')->with('success', 'Pesanan berhasil dibuat.');
}

    
    public function daftarPesanan()
    {
        $pesanans = auth()->user()->pesanans()->with('destinasi')->latest()->get();
        return view('daftar_pesanan', compact('pesanans'));
    }
    
    public function cancel(Pesanan $pesanan)
    {
        $this->authorize('cancel', $pesanan);
        
        if ($pesanan->status !== 'pending') {
            return back()->with('error', 'Hanya pesanan pending yang bisa dibatalkan.');
        }
        
        $pesanan->update(['status' => 'canceled']);
        
        return back()->with('success', 'Pesanan berhasil dibatalkan.');
    }
}