<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Detail Produk</title>
</head>
<body>
    <h1>Detail Produk</h1>

    @if ($product)
        <h2>{{ $product['nama'] }}</h2>
        <p>Deskripsi: {{ $product['deskripsi'] }}</p>
        <p>Harga: Rp {{ number_format($product['harga'], 0, ',', '.') }}</p>

        @if (isset($product['gambar']))
            <img src="{{ asset('images/' . $product['gambar']) }}" alt="{{ $product['nama'] }}" width="200">
        @endif

        @if (isset($product['fitur']) && count($product['fitur']) > 0)
            <h3>Fitur Utama:</h3>
            <ul>
                @foreach ($product['fitur'] as $fitur)
                    <li>{{ $fitur }}</li>
                @endforeach
            </ul>
        @endif

        <p><a href="{{ route('products.index') }}">Kembali ke Daftar Produk</a></p>
    @else
        <p>Produk tidak ditemukan.</p>
    @endif
</body>
</html>
