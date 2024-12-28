<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    // Menampilkan form edit profile
    public function edit()
    {
        $user = Auth::user(); // Ambil data user yang sedang login
        return view('profile.edit', compact('user'));
    }

    // Memperbarui data profile
    public function update(Request $request)
    {
        // Validasi input
        $request->validate([
            'email' => 'required|string|email|max:255',
            'password' => 'nullable|string|min:8|confirmed', // Hanya wajib jika password diubah
        ]);

        $user = Auth::user();
        // Update data user
        $user->update([
            'name' => $request->name,
            'email' => $request->email,
            
        ]);

        // Update password jika diisi
        if ($request->filled('password')) {
            $user->update([
                'password' => Hash::make($request->password)
        ]);

        }
        if ($request->filled('fav_categories')) {
            $user->update([
                'fav_categories'=>$request->fav_categories
        ]);
        }

        return redirect()->route('profile.edit')->with('success', 'Profile updated successfully.');
    }
}

