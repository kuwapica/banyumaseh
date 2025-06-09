<?php

namespace App\Http\Controllers;

use App\Models\Destinasi;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        // Ambil 4 destinasi featured untuk carousel
        $featuredDestinations = Destinasi::where('featured', true)
            ->orderBy('rating', 'desc')
            ->take(4)
            ->get();

        // Ambil 3 destinasi featured untuk section utama
        $mainDestinations = Destinasi::where('featured', true)
            ->orderBy('rating', 'desc')
            ->take(3)
            ->get();

        return view('home', compact('featuredDestinations', 'mainDestinations'));
    }
}