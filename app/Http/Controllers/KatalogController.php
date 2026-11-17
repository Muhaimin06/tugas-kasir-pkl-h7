<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class KatalogController extends Controller
{
    public function index(Request $request): \Illuminate\View\View
    {
        // 1. Tangkap input 'q' dari form (default string kosong)
        $q = $request->input('q', '');

        // Data dummy produk
        $produk = [
            ['id' => 1, 'nama' => 'Kopi Ende', 'kategori' => 'minuman', 'harga' => 15000, 'stok' => 12],
            ['id' => 2, 'nama' => 'Roti Coklat', 'kategori' => 'makanan', 'harga' => 8000, 'stok' => 0],
            ['id' => 3, 'nama' => 'Teh', 'kategori' => 'minuman', 'harga' => 5000, 'stok' => 20],
            ['id' => 3, 'nama' => 'Roma', 'kategori' => 'makanan', 'harga' => 15000, 'stok' => 20],
        ];

        // 2. Lakukan filter jika variabel $q diisi oleh pengguna
        if (!empty($q)) {
            $produk = array_filter($produk, function ($item) use ($q) {
                // Mencari nama produk yang mengandung kata kunci $q (tidak case-sensitive)
                return stripos($item['nama'], $q) !== false;
            });
        }

        // 3. Kirim data produk yang sudah difilter dan nilai $q ke view
        return view('katalog.index', compact('produk', 'q'));
    }
}