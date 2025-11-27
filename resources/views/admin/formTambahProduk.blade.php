<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <style>
        /* CSS Native untuk Styling */
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            background-color: #7b8ea8; /* Background gelap seperti desain */
            display: flex;
            justify-content: center;
            align-items: center;
            min-height: 100vh;
        }

        .form-container {
            background-color: #5d7088; /* Warna latar belakang kontainer utama */
            padding: 30px;
            border-radius: 15px;
            width: 90%;
            max-width: 600px;
            box-shadow: 0 0 20px rgba(0, 0, 0, 0.5);
            position: relative;
        }

        /* --- Header dan Tombol Kembali --- */
        .header {
            display: flex;
            justify-content: flex-end;
            margin-bottom: 20px;
        }

        .btn-kembali {
            background-color: #557297;
            color: white;
            padding: 10px 20px;
            border: none;
            border-radius: 8px;
            cursor: pointer;
            text-decoration: none;
            font-weight: bold;
            font-size: 0.9em;
        }

        /* --- Input Group Styling --- */
        .form-group {
            margin-bottom: 25px;
        }

        .form-group label {
            display: block;
            color: #d8e0e6;
            margin-bottom: 8px;
            font-weight: bold;
        }

        .input-field, .select-field {
            width: 100%;
            padding: 12px;
            border: none;
            border-radius: 8px;
            background-color: #557297; /* Warna input field */
            color: white;
            font-size: 1em;
            box-sizing: border-box;
            outline: none; /* Hilangkan garis fokus default */
        }
        
        .input-field::placeholder {
            color: #aeb8c3;
        }

        /* --- Kategori Dropdown & Button Group --- */
        .category-group {
            position: relative;
            width: 100%;
        }

        .select-field {
            /* Gaya untuk dropdown kategori */
            appearance: none; /* Hilangkan default arrow */
            -webkit-appearance: none;
            -moz-appearance: none;
            padding-right: 40px; /* Ruang untuk arrow kustom */
            cursor: pointer;
        }

        /* Arrow Kustom untuk Dropdown */
        .category-group::after {
            content: '▼';
            position: absolute;
            top: 40px; 
            right: 15px;
            color: white;
            font-size: 0.7em;
            pointer-events: none;
        }

        .category-buttons {
            display: flex;
            gap: 10px;
            margin-top: 15px;
        }

        .category-btn {
            background-color: #557297; /* Warna tombol kategori */
            color: white;
            padding: 8px 15px;
            border: none;
            border-radius: 8px;
            cursor: pointer;
            font-size: 0.9em;
        }
        
        /* --- Tombol Simpan --- */
        .footer {
            display: flex;
            justify-content: flex-end;
            margin-top: 40px;
        }

        .btn-simpan {
            background-color: #557297;
            color: white;
            padding: 12px 30px;
            border: none;
            border-radius: 8px;
            cursor: pointer;
            font-size: 1em;
            font-weight: bold;
        }
    </style>
</head>
<body>
<div class="form-container">
    
    <div class="header">
        <a href="{{ route('admin.dashboard') }}" class="btn-kembali">KEMBALI</a>
    </div>

    <form method="POST" action="{{ isset($product) ? route('products.update', $product->id) : route('products.store') }}">
        @csrf
        @if(isset($product))
            @method('PUT') 
        @endif

        <div class="form-group">
            <label for="name_products">Produk</label>
            <input 
                type="text" 
                id="name_products" 
                name="name_products" 
                class="input-field" 
                placeholder="Masukkan nama produk"
                value="{{ $product->name_products ?? old('name_products') }}"
                required
            >
        </div>

        <div class="form-group">
            <label for="price">Harga</label>
            <input 
                type="number" 
                id="price" 
                name="price" 
                class="input-field" 
                placeholder="Masukkan harga produk"
                value="{{ $product->price ?? old('price') }}"
                required
            >
        </div>

        <div class="form-group">
            <label for="initial_stock">Stok Awal</label>
            <input 
                type="number" 
                id="initial_stock" 
                name="initial_stock" 
                class="input-field" 
                placeholder="Masukkan stok awal produk"
                value="{{ $product->initial_stock ?? old('initial_stock') }}"
                required
            >
        </div>

        <div class="footer">
            <button type="submit" class="btn-simpan">SIMPAN</button>
        </div>
    </form>
</div>
</body>
</html>