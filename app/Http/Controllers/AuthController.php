<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    // Menampilkan halaman register
    public function showRegister()
    {
        return view('register');
    }

    // Menyimpan data user baru
    public function register(Request $request)
    {
        // Validasi input
        $request->validate([
            'username' => 'required|string|max:50',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|min:6|confirmed',
        ]);

        // Simpan ke database
        User::create([
            'name' => $request->username,
            'email' => $request->email,
            'password' => Hash::make($request->password), // enkripsi password
        ]);

        // Arahkan ke halaman login setelah sukses
        return redirect()->route('login')->with('success', 'Registrasi berhasil! Silakan login.');
    }
}
