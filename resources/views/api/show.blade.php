<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Detail Produk</title>
    <style>
        .product-details {
            padding: 20px;
            border: 1px solid #ddd;
            margin-bottom: 20px;
            display: flex;
            align-items: flex-start;
        }

        .product-image {
            margin-right: 20px;
        }

        .product-info {
            flex-grow: 1;
        }

        .product-title {
            font-size: 1.5em;
            font-weight: bold;
            margin-bottom: 10px;
        }

        .product-price {
            color: green;
            font-size: 1.2em;
            font-weight: bold;
            margin-bottom: 15px;
        }

        .product-description {
            line-height: 1.6;
            margin-bottom: 20px;
        }

        .product-category {
            font-style: italic;
            color: #777;
            margin-bottom: 10px;
        }
    </style>
</head>

<body>
    <h1>Detail Produk</h1>

    @if (isset($product))
        <div class="product-details">
            <div class="product-image">
                <img src="{{ $product['image'] }}" alt="{{ $product['title'] }}" width="200">
            </div>
            <div class="product-info">
                <h2 class="product-title">{{ $product['title'] }}</h2>
                <p class="product-price">Harga: ${{ number_format($product['price'], 2) }}</p>
                <p class="product-category">Kategori: {{ $product['category'] }}</p>
                <p class="product-description">{{ $product['description'] }}</p>
            </div>
        </div>
        <p><a href="{{ route('api.products') }}">Kembali ke Daftar Produk</a></p>
    @else
        <p>Produk tidak ditemukan.</p>
    @endif
</body>

</html>
