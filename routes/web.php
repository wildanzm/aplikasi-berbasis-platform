<?php

use Illuminate\Support\Facades\Route;
use App\Product;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\ApiController;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/produk', function () {
    $produk1 = new Product('Laptop ASUS ROG', 'Laptop gaming dengan performa tinggi', 15000000);
    $produk2 = new Product('Mouse Logitech G Pro X', 'Mouse gaming wireless ringan', 1200000);

    dump($produk1); // Menampilkan informasi object $produk1
    dump($produk2); // Menampilkan informasi object $produk2
});

// Rute untuk menampilkan daftar produk
Route::get('/products', [ProductController::class, 'index'])->name('products.index');

// Rute untuk menampilkan detail produk dengan parameter 'id'
Route::get('/products/{id}', [ProductController::class, 'show'])->name('products.show');

// Rute untuk mengambil dan menampilkan produk dari API
Route::get('/api/products', [ApiController::class, 'getProductsFromApi'])->name('api.products');

Route::get('/api/products/search', [ApiController::class, 'searchProducts'])->name('api.products.search');

Route::get('/api/products/{id}', [ApiController::class, 'showProduct'])->name('api.products.show');
