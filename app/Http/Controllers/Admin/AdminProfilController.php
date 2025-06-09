<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class AdminProfilController extends Controller
{
    public function edit()
    {
        $user = auth()->user();
        return view('admin.adminprofil', compact('user'));
    }

    public function update(Request $request)
    {
        $user = auth()->user();
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|max:255|unique:users,email,' . $user->id,
            'password' => 'nullable|string|min:6|confirmed',
        ]);

        $user->name = $request->name;
        $user->email = $request->email;


        if ($request->filled('password')) {
            $user->password = bcrypt($request->password);
        }

        $user->save();

        return redirect()->route('admin.profil.edit', $user)->with('success', 'Profil Berhasil Diupdate.');
    }
}
