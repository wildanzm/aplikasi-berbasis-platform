<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function index()
    {
        $products = [
            [
                'id' => 1,
                'nama' => 'Laptop ASUS ROG',
                'deskripsi' => 'Laptop gaming dengan performa tinggi',
                'harga' => 15000000,
                'gambar' => 'laptop.jpg', // Contoh nama file gambar
            ],
            [
                'id' => 2,
                'nama' => 'Mouse Logitech G Pro X',
                'deskripsi' => 'Mouse gaming wireless ringan',
                'harga' => 1200000,
                'gambar' => 'mouse.jpg', // Contoh nama file gambar
            ],
            [
                'id' => 3,
                'nama' => 'Keyboard Mechanical Corsair',
                'deskripsi' => 'Keyboard mekanik dengan switch Cherry MX',
                'harga' => 2500000,
                'gambar' => 'keyboard.jpg', // Contoh nama file gambar
            ],
        ];

        // Mengirimkan data array $products ke view 'products.index'
        return view('products.index', compact('products'));
    }

    public function show($id)
    {
        $product = null;
        $products = [
            [
                'id' => 1,
                'nama' => 'Laptop ASUS ROG',
                'deskripsi' => 'Laptop gaming dengan performa tinggi',
                'harga' => 15000000,
                'gambar' => 'laptop.jpg',
                'fitur' => ['Layar 15.6 inch', 'RAM 16GB', 'SSD 1TB'],
            ],
            [
                'id' => 2,
                'nama' => 'Mouse Logitech G Pro X',
                'deskripsi' => 'Mouse gaming wireless ringan',
                'harga' => 1200000,
                'gambar' => 'mouse.jpg',
                'fitur' => ['Wireless Lightspeed', 'Sensor HERO 25K', '8 Tombol'],
            ],
            [
                'id' => 3,
                'nama' => 'Keyboard Mechanical Corsair',
                'deskripsi' => 'Keyboard mekanik dengan switch Cherry MX',
                'harga' => 2500000,
                'gambar' => 'keyboard.jpg',
                'fitur' => ['Cherry MX Brown', 'RGB Backlighting', '104 Keys'],
            ],
        ];

        // Mencari produk berdasarkan ID
        foreach ($products as $p) {
            if ($p['id'] == $id) {
                $product = $p;
                break;
            }
        }

        if ($product) {
            // Mengirimkan data $product ke view 'products.show'
            return view('products.show', compact('product'));
        } else {
            // Menangani jika produk tidak ditemukan
            abort(404, 'Produk tidak ditemukan.');
        }
    }
}
