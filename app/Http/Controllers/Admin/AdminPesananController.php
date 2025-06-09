<?php

namespace App\Http\Controllers\Admin;

use App\Models\Pesanan;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class AdminPesananController extends Controller
{
    public function index()
    {
        $pesanans = Pesanan::with('user', 'destinasi')->latest()->get();
        return view('admin.customer_pesanan', compact('pesanans'));
    }

    public function show($id)
    {
        $pesanan = Pesanan::with('user', 'destinasi')->findOrFail($id);
        return view('admin.pesanan.show', compact('pesanan'));
    }

    public function updateStatus(Request $request, $id)
    {
        $request->validate([
            'status' => 'required|in:pending,confirmed,canceled',
        ]);

        $pesanan = Pesanan::findOrFail($id);
        $pesanan->update(['status' => $request->status]);

        return redirect()->route('admin.customer_pesanan')->with('success', 'Status pesanan diperbarui.');
    }
}
