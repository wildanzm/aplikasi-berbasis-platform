<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Http;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class ApiController extends Controller
{
    public function getProductsFromApi()
    {
        Log::info('Mencoba mengambil data produk dari API...');
        $response = Http::get('https://fakestoreapi.com/products');

        if ($response->successful()) {
            $products = $response->json();
            dd($products); // Tambahkan baris ini
            // Mengirimkan data produk ke view 'api.products'
            Log::info('Data produk berhasil diambil dari API.', ['jumlah_produk' => count($products)]);
            return view('api.products', compact('products'));
        } else {
            // Menangani jika request API gagal
            Log::error('Gagal mengambil data dari API.', ['status_code' => $response->status()]);
            return view('api.error', ['message' => 'Gagal mengambil data dari API. Status: ' . $response->status()]);
        }
    }

    public function searchProducts(Request $request)
    {
        $keyword = $request->input('keyword');

        if ($keyword) {
            $response = Http::get('https://fakestoreapi.com/products');

            if ($response->successful()) {
                $allProducts = $response->json();
                // Menerapkan logika pencarian sederhana (berdasarkan judul)
                $searchResults = array_filter($allProducts, function ($product) use ($keyword) {
                    return stripos($product['title'], $keyword) !== false;
                });

                // Mengirimkan hasil pencarian ke view yang sama
                return view('api.products', ['products' => $searchResults, 'keyword' => $keyword]);
            } else {
                return view('api.error', ['message' => 'Gagal mengambil data dari API untuk pencarian. Status: ' . $response->status()]);
            }
        } else {
            // Jika tidak ada keyword, tampilkan semua produk
            return $this->getProductsFromApi();
        }
    }

    public function showProduct($id)
    {
        Log::info("Mencoba mengambil detail produk dengan ID: {$id} dari API...");
        $response = Http::get("https://fakestoreapi.com/products/{$id}");

        if ($response->successful()) {
            $product = $response->json();
            Log::info("Detail produk dengan ID: {$id} berhasil diambil.", ['nama_produk' => $product['title']]);
            return view('api.show', compact('product'));
        } else {
            Log::error("Gagal mengambil detail produk dengan ID: {$id} dari API.", ['status_code' => $response->status()]);
            return view('api.error', ['message' => 'Gagal mengambil detail produk dari API. Status: ' . $response->status()]);
        }
    }
}
