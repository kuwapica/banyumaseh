<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Destinasi;
use Illuminate\Http\Request;
use Illuminate\Container\Attributes\Storage;

class DestinasiController extends Controller
{
    public function index(Request $request)
    {
        $query = Destinasi::query();

        // Search
        if ($request->filled('search')) {
            $query->where('name', 'like', '%' . $request->search . '%')
                ->orWhere('description', 'like', '%' . $request->search . '%');
        }

        // Filter by category
        if ($request->filled('category')) {
            $query->where('category', $request->category);
        }

        // Filter by rating
        if ($request->filled('rating')) {
            $query->where('rating', '>=', $request->rating);
        }

        // Sort
        $sortBy = $request->get('sort', 'name');
        $sortOrder = $request->get('order', 'asc');

        switch ($sortBy) {
            case 'rating':
                $query->orderBy('rating', $sortOrder);
                break;
            case 'price':
                $query->orderBy('price', $sortOrder);
                break;
            default:
                $query->orderBy('name', $sortOrder);
                break;
        }

        $destinations = $query->paginate(12)->withQueryString();
        $categories = Category::all();

        return view('destinasi', compact('destinations', 'categories'));
    }
}
