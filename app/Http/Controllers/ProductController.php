<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;

class ProductController extends Controller
{
    // Tampilkan form create + list produk (seperti di gambar)
    public function create()
    {
        // ambil semua produk terbaru
        $products = Product::orderBy('id')->get();
        return view('products.create', compact('products'));
    }

    // Proses simpan
    public function store(Request $request)
    {
        $data = $request->validate([
            'nama' => 'required|string|max:255',
            'harga' => 'required|numeric',
            'stok' => 'required|integer',
            'deskripsi' => 'nullable|string',
        ]);

        Product::create($data);

        // redirect kembali ke form dengan pesan sukses
        return redirect()->route('products.create')->with('success', 'data sukses dikirim');
    }
}
