<?php

namespace App\Http\Controllers\Admin;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Destinasi;
use App\Models\Pesanan;

class DashboardController extends Controller
{
    public function index()
    {
        $totalUsers = User::count();
        $totalDestinasi = Destinasi::count();
        $totalPesanan = Pesanan::count();
        return view('admin.dashboard', compact(
            'totalUsers',
            'totalDestinasi',
            'totalPesanan'
        ));
    }
}
