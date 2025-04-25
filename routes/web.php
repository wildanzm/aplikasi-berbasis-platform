<?php

use Illuminate\Support\Facades\Route;
use App\Product;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/produk', function () {
    $produk1 = new Product('Laptop ASUS ROG', 'Laptop gaming dengan performa tinggi', 15000000);
    $produk2 = new Product('Mouse Logitech G Pro X', 'Mouse gaming wireless ringan', 1200000);

    dump($produk1); // Menampilkan informasi object $produk1
    dump($produk2); // Menampilkan informasi object $produk2
});
