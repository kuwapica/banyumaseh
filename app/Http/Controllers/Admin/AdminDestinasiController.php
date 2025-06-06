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


    /**
     * Display the specified resource.
     */
    public function show(Destinasi $destinasi)
    {
        return view('destinasis.show', compact('destinasi'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Destinasi $destinasi)
    {
        return view('destinasis.edit', compact('destinasi'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Destinasi $destinasi)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'content' => 'required',
            'image' => 'nullable|image|max:2048',
        ]);

        $destinasi->title = $request->title;
        $destinasi->content = $request->content;

        if ($request->hasFile('image')) {
            if ($destinasi->image) {
                Storage::delete('public/' . $destinasi->image);
            }
            $imagePath = $request->file('image')->store('destinasis', 'public');
            $destinasi->image = $imagePath;
        }

        $destinasi->save();

        return redirect()->route('destinasis.index')->with('success', 'Destinasi updated successfully.');
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
        return redirect()->route('destinasis.index')->with('success', 'Destinasi deleted successfully.');
    }
}
