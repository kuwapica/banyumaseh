<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PageController extends Controller
{
    public function index()
    {
        return view('index');
    }

    public function daftar_pesanan()
    {
        return view('daftar_pesanan');
    }

    public function pesan_tiket()
    {
        return view('pesan_tiket');
    }
}
