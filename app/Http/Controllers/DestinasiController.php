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

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('destinasis.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'content' => 'required',
            'image' => 'nullable|image|max:2048', // Max 2MB
        ]);

        $destinasi = new Destinasi();
        $destinasi->title = $request->title;
        $destinasi->content = $request->content;

        if ($request->hasFile('image')) {
            $imagePath = $request->file('image')->store('destinasis', 'public');
            $destinasi->image = $imagePath;
        }

        $destinasi->save();

        return redirect()->route('destinasis.index')->with('success', 'Destinasi created successfully.');
    }
}
