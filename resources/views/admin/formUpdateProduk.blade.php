@extends('layouts.navbar')

@section('content')

{{-- 
    Pastikan variabel $product sudah dikirim dari ProductController@edit,
    contoh: return view('admin.formEditProduk', compact('product'));
--}}
<div class="form-container">

    {{-- Header dengan Tombol Kembali --}}
    <div class="form-header">
        <h1 class="form-title">EDIT PRODUK: {{ $product->name_products }}</h1>
        <a href="{{ route('admin.produk') }}" class="btn-kembali">KEMBALI</a>
    </div>

    {{-- Form Edit Produk --}}
    <form action="{{ route('edit', $product->id) }}" method="POST" class="edit-form">
        @csrf
        @method('PUT') {{-- PENTING: Mengirim request sebagai UPDATE (PUT/PATCH) --}}

        {{-- 1. Input Produk --}}
        <div class="form-group">
            <label for="name_products">Produk</label>
            <input 
                type="text" 
                id="name_products" 
                name="name_products" 
                value="{{ old('name_products', $product->name_products) }}" 
                class="form-input"
                required>
            @error('name_products')
                <div class="error-message">{{ $message }}</div>
            @enderror
        </div>
        {{-- 3. Input Harga --}}
        <div class="form-group">
            <label for="price">Harga (Rp)</label>
            <input 
                type="number" 
                id="price" 
                name="price" 
                value="{{ old('price', $product->price) }}" 
                class="form-input"
                required>
            @error('price')
                <div class="error-message">{{ $message }}</div>
            @enderror
        </div>

        {{-- 4. Input Stok Awal (Hati-hati saat mengedit stok awal!) --}}
        <div class="form-group">
            <label for="initial_stock">Stok Awal</label>
            <input 
                type="number" 
                id="initial_stock" 
                name="initial_stock" 
                value="{{ old('initial_stock', $product->initial_stock) }}" 
                class="form-input"
                required>
            @error('initial_stock')
                <div class="error-message">{{ $message }}</div>
            @enderror
        </div>
        
        <button type="submit" class="btn-simpan">SIMPAN PERUBAHAN</button>
    </form>
</div>

@endsection

{{-- Mendorong CSS ke Layout Induk --}}
@push('styles')
<style>
/* --- STYLING KHUSUS UNTUK FORM TAMBAH/EDIT PRODUK (Mengacu image_7480b8.png) --- */

.form-container {
    max-width: 600px;
    margin: 30px auto;
    padding: 40px;
    border-radius: 20px;
    background-color: rgba(255, 255, 255, 0.1); /* Background form transparan */
    border: 3px solid rgba(255, 255, 255, 0.4); /* Border putih tipis */
    backdrop-filter: blur(5px);
    box-shadow: 0 4px 30px rgba(0, 0, 0, 0.1);
}

.form-header {
    display: flex;
    justify-content: space-between;
    align-items: center;
    margin-bottom: 25px;
    padding-bottom: 10px;
    border-bottom: 1px solid rgba(255, 255, 255, 0.3);
}

.form-title {
    color: white;
    font-size: 1.5rem;
    font-weight: 700;
}

.btn-kembali {
    padding: 8px 20px;
    background-color: #6683B1; /* Warna tombol Kembali di desain */
    color: white;
    text-decoration: none;
    border-radius: 10px;
    font-weight: 600;
    transition: background-color 0.2s;
}
.btn-kembali:hover {
    background-color: #465C88;
}

.form-group {
    margin-bottom: 20px;
}

.form-group label {
    display: block;
    color: white;
    font-weight: 600;
    margin-bottom: 8px;
    font-size: 1.1em;
}

.form-input, .form-select {
    width: 100%;
    padding: 15px;
    border: none;
    border-radius: 15px;
    background-color: #465C88; /* Warna input sesuai desain */
    color: white;
    font-size: 1em;
    box-shadow: inset 0 2px 4px rgba(0, 0, 0, 0.2);
    box-sizing: border-box; /* Agar padding tidak melebarkan input */
}
.form-input::placeholder {
    color: rgba(255, 255, 255, 0.6);
}

/* Styling Khusus Dropdown/Select */
.form-select {
    appearance: none; /* Menghilangkan style default browser */
    background-image: url("data:image/svg+xml;charset=UTF-8,%3csvg xmlns='http://www.w3.org/2000/svg' viewBox='0 0 20 20' fill='%23ffffff'%3e%3cpath fill-rule='evenodd' d='M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z' clip-rule='evenodd'/%3e%3c/svg%3e");
    background-repeat: no-repeat;
    background-position: right 15px center;
    padding-right: 40px;
}

.btn-simpan {
    float: right;
    padding: 12px 30px;
    background-color: #3f51b5; /* Warna tombol Simpan */
    color: white;
    border: none;
    border-radius: 10px;
    font-weight: 700;
    cursor: pointer;
    transition: background-color 0.2s;
    margin-top: 20px;
}
.btn-simpan:hover {
    background-color: #303f9f;
}

.error-message {
    color: #ffdddd;
    margin-top: 5px;
    font-size: 0.9em;
}
</style>
@endpush