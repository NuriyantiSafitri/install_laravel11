<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        // Data produk fashion (dummy data)
        $produk = [
            [
                'nama' => 'Kaos Oversize',
                'kategori' => 'Atasan',
                'ukuran' => 'L',
                'harga' => 120000,
                'stok' => 10
            ],
            [
                'nama' => 'Celana Jeans',
                'kategori' => 'Bawahan',
                'ukuran' => '32',
                'harga' => 250000,
                'stok' => 8
            ],
            [
                'nama' => 'Hoodie Zipper',
                'kategori' => 'Jaket',
                'ukuran' => 'XL',
                'harga' => 300000,
                'stok' => 5
            ]
        ];

        // Kirim data ke view
        return view('home', compact('produk'));
    }
}


