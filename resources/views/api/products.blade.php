<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Produk dari API</title>
    <style>
        .product-list {
            list-style: none;
            padding: 0;
        }

        .product-item {
            border: 1px solid #ddd;
            margin-bottom: 15px;
            padding: 10px;
            display: flex;
            align-items: center;
        }

        .product-image {
            margin-right: 15px;
        }

        .product-details {
            flex-grow: 1;
        }

        .product-title {
            font-size: 1.2em;
            font-weight: bold;
            margin-bottom: 5px;
        }

        .product-price {
            color: green;
            font-weight: bold;
        }

        .product-description {
            font-size: 0.9em;
            color: #555;
        }
    </style>
</head>

<body>
    <h1>Daftar Produk dari API</h1>

    @php
        dd($products); // Tambahkan baris ini
    @endphp

    <form action="{{ route('api.products.search') }}" method="GET" style="margin-bottom: 20px;">
        <input type="text" name="keyword" placeholder="Cari produk..." value="{{ request('keyword') }}">
        <button type="submit">Cari</button>
    </form>

    @if (isset($keyword))
        <p>Hasil pencarian untuk: <strong>{{ $keyword }}</strong></p>
    @endif


    @if (isset($products) && count($products) > 0)
        <ul class="product-list">
            @foreach ($products as $product)
                <li class="product-item">
                    <div class="product-image">
                        <img src="{{ $product['image'] }}" alt="{{ $product['title'] }}" width="100">
                    </div>
                    <div class="product-details">
                        <h2 class="product-title">
                            <a href="{{ route('api.products.show', ['id' => $product['id']]) }}">
                                {{ $product['title'] }}
                            </a>
                        </h2>
                        <p class="product-price">Harga: ${{ number_format($product['price'], 2) }}</p>
                        <p class="product-description">{{ Str::limit($product['description'], 150) }}</p>
                        <p>Kategori: {{ $product['category'] }}</p>
                    </div>
                </li>
            @endforeach
        </ul>
    @else
        <p>
            @if (isset($keyword))
                Tidak ada produk yang ditemukan untuk kata kunci "{{ $keyword }}".
            @else
                Tidak ada produk yang diterima dari API.
            @endif
        </p>
    @endif

    <p><a href="{{ route('products.index') }}">Kembali ke Daftar Produk Lokal</a></p>
</body>

</html>
