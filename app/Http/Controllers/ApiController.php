<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Http;
use Illuminate\Http\Request;

class ApiController extends Controller
{
    public function getProductsFromApi()
    {
        $response = Http::get('https://fakestoreapi.com/products');

        if ($response->successful()) {
            $products = $response->json();
            // Mengirimkan data produk ke view 'api.products'
            return view('api.products', compact('products'));
        } else {
            // Menangani jika request API gagal
            return view('api.error', ['message' => 'Gagal mengambil data dari API. Status: ' . $response->status()]);
        }
    }
}
