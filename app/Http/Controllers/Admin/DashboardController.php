<?php

namespace App\Http\Controllers\Admin;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Destinasi;

class DashboardController extends Controller
{
    public function index()
    {
        $totalUsers = User::count();
        $totalDestinasi = Destinasi::count();
        return view('admin.dashboard', compact(
            'totalUsers',
            'totalDestinasi'
        ));
    }
}
