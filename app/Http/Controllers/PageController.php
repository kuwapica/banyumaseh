<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PageController extends Controller
{
    public function index()
    {
        return view('home');
    }

    public function daftar_pesanan()
    {
        return view('daftar_pesanan');
    }

    public function pesan_tiket()
    {
        return view('pesan_tiket');
    }

    public function destination()
    {
        return view('destinasi');
    }
}
