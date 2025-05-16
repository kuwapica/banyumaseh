<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Destinasi;
use App\Models\Pesanan;
use Illuminate\Support\Str;
use Carbon\Carbon;

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
            'destinasi_id' => 'required|exists:destinasis,id',
            'nama_lengkap' => 'required|string|max:255',
            'no_identitas' => 'required|string|max:20',
            'no_hp' => 'required|string|max:15',
            'tanggal_kunjungan' => 'required|date|after_or_equal:today',
            'jumlah_tiket' => 'required|integer|min:1'
        ]);
        
        $destinasi = Destinasi::findOrFail($request->destinasi_id);
        
        if ($destinasi->kuota < $request->jumlah_tiket) {
            return back()->with('error', 'Kuota tidak mencukupi untuk jumlah tiket yang diminta.');
        }
        
        $pesanan = new Pesanan();
        $pesanan->user_id = auth()->id();
        $pesanan->destinasi_id = $request->destinasi_id;
        $pesanan->nama_lengkap = $request->nama_lengkap;
        $pesanan->no_identitas = $request->no_identitas;
        $pesanan->no_hp = $request->no_hp;
        $pesanan->tanggal_kunjungan = $request->tanggal_kunjungan;
        $pesanan->jumlah_tiket = $request->jumlah_tiket;
        $pesanan->harga_tiket = $destinasi->harga;
        $pesanan->total_bayar = $destinasi->harga * $request->jumlah_tiket;
        $pesanan->kode_booking = Str::upper(Str::random(8));
        $pesanan->save();
        
        $destinasi->kuota -= $request->jumlah_tiket;
        $destinasi->save();
        
        return redirect()->route('daftar_pesanan')->with('success', 'Pesanan berhasil dibuat! Kode Booking: ' . $pesanan->kode_booking);
    }
    
    public function daftarPesanan()
    {
        $pesanans = auth()->user()->pesanans()->with('destinasi')->latest()->get();
        return view('daftar_pesanan', compact('pesanans'));
    }
    
    public function cancel(Pesanan $pesanan)
    {
        if ($pesanan->user_id !== auth()->id()) {
            abort(403);
        }
        
        if ($pesanan->status !== 'pending') {
            return back()->with('error', 'Hanya pesanan pending yang bisa dibatalkan.');
        }
        
        $destinasi = $pesanan->destinasi;
        $destinasi->kuota += $pesanan->jumlah_tiket;
        $destinasi->save();
        
        $pesanan->status = 'canceled';
        $pesanan->save();
        
        return back()->with('success', 'Pesanan berhasil dibatalkan.');
    }
}
