<?php

namespace App\Http\Controllers;

use App\Models\Destinasi;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        $featuredDestinations = Destinasi::where('featured', true)
            ->orderBy('rating', 'desc')
            ->take(4)
            ->get();

        $mainDestinations = Destinasi::where('featured', true)
            ->orderBy('rating', 'desc')
            ->take(3)
            ->get();

        return view('home', compact('featuredDestinations', 'mainDestinations'));
    }
}
