<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Daftar Produk</title>
</head>
<body>
    <h1>Daftar Produk</h1>

    @if (count($products) > 0)
        <ul>
            @foreach ($products as $product)
                <li>
                    <a href="{{ route('products.show', ['id' => $product['id']]) }}">
                        {{ $product['nama'] }} - Rp {{ number_format($product['harga'], 0, ',', '.') }}
                    </a>
                </li>
            @endforeach
        </ul>
    @else
        <p>Tidak ada produk yang tersedia.</p>
    @endif
</body>
</html>
