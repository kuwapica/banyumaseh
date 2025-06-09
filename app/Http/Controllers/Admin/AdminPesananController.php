<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Pesanan;
use Illuminate\Http\Request;

class AdminPesananController extends Controller
{
    public function index()
    {
        $pesanans = Pesanan::with(['user', 'destinasi'])
            ->latest()
            ->paginate(10);
            
        return view('admin.customer_pesanan', compact('pesanans'));
    }

    public function show(Pesanan $pesanan)
    {
        return view('admin.detail_customer_pesanan', compact('pesanan'));
    }

    public function updateStatus(Request $request, Pesanan $pesanan)
    {
        $request->validate([
            'status' => 'required|in:confirmed,canceled'
        ]);

        $pesanan->update(['status' => $request->status]);

        return back()->with('success', 'Status pesanan berhasil diperbarui');
    }
}