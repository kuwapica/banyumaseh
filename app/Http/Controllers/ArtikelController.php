<?php

namespace App\Http\Controllers;

use App\Models\Artikel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ArtikelController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $artikels = Artikel::latest()->get();
        return view('artikels.index', compact('artikels'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('artikels.create');
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

        $artikel = new Artikel();
        $artikel->title = $request->title;
        $artikel->content = $request->content;

        if ($request->hasFile('image')) {
            $imagePath = $request->file('image')->store('artikels', 'public');
            $artikel->image = $imagePath;
        }

        $artikel->save();

        return redirect()->route('artikels.index')->with('success', 'Artikel created successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Artikel $artikel)
    {
        return view('artikels.show', compact('artikel'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Artikel $artikel)
    {
        return view('artikels.edit', compact('artikel'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Artikel $artikel)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'content' => 'required',
            'image' => 'nullable|image|max:2048',
        ]);

        $artikel->title = $request->title;
        $artikel->content = $request->content;

        if ($request->hasFile('image')) {
            if ($artikel->image) {
                Storage::delete('public/' . $artikel->image);
            }
            $imagePath = $request->file('image')->store('artikels', 'public');
            $artikel->image = $imagePath;
        }

        $artikel->save();

        return redirect()->route('artikels.index')->with('success', 'Artikel updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Artikel $artikel)
    {
        if ($artikel->image) {
            Storage::delete('public/' . $artikel->image);
        }
        $artikel->delete();
        return redirect()->route('artikels.index')->with('success', 'Artikel deleted successfully.');
    }
}
