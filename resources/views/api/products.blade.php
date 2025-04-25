<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Produk dari API</title>
</head>

<body>
    <h1>Daftar Produk dari API</h1>

    @if (isset($products) && count($products) > 0)
        <ul>
            @foreach ($products as $product)
                <li>
                    {{ $product['title'] }} - Harga: ${{ $product['price'] }}
                    <br>
                    <img src="{{ $product['image'] }}" alt="{{ $product['title'] }}" width="100">
                    <p>{{ Str::limit($product['description'], 100) }}</p>
                </li>
                <hr>
            @endforeach
        </ul>
    @else
        <p>Tidak ada produk yang diterima dari API.</p>
    @endif

    <p><a href="{{ route('products.index') }}">Kembali ke Daftar Produk Lokal</a></p>
</body>

</html>
