<?php

namespace App\Http\Controllers\Admin;

use App\Models\Destinasi;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;

class AdminDestinasiController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $destinasis = Destinasi::latest()->get();
        return view('admin.destinasi', compact('destinasis'));
    }
    public function create()
    {
        return view('admin.createdestinasi');
    }
    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'required',
            'image' => 'nullable|image|max:2048', // Max 2MB
            'price' => 'required|numeric',
            'location' => 'required',
        ]);

        $destinasi = new Destinasi();
        $destinasi->name = $request->name;
        $destinasi->description = $request->description;
        $destinasi->price = $request->price;
        $destinasi->location = $request->location;

        if ($request->hasFile('image')) {
            $imagePath = $request->file('image')->store('destinasi', 'public');
            $destinasi->image = $imagePath;
        }

        $destinasi->save();

        return redirect()->route('destinasi.index')->with('success', 'Post created successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Destinasi $destinasi)
    {
        return view('destinasi.show', compact('destinasi'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Destinasi $destinasi)
    {
        return view('destinasi.edit', compact('destinasi'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Destinasi $destinasi)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'required',
            'image' => 'nullable|image|max:2048', // Max 2MB
            'location' => 'required',
            'price' => 'required|numeric',
        ]);

        $destinasi->name = $request->name;
        $destinasi->description = $request->description;
        $destinasi->location = $request->location;
        $destinasi->price = $request->price;

        if ($request->hasFile('image')) {
            if ($destinasi->image) {
                Storage::delete('public/' . $destinasi->image);
            }
            $imagePath = $request->file('image')->store('destinasi', 'public');
            $destinasi->image = $imagePath;
        }

        $destinasi->save();

        return redirect()->route('destinasi.index')->with('success', 'Destinasi updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Destinasi $destinasi)
    {
        if ($destinasi->image) {
            Storage::delete('public/' . $destinasi->image);
        }
        $destinasi->delete();
        return redirect()->route('destinasi.index')->with('success', 'Destinasi deleted successfully.');
    }
}
