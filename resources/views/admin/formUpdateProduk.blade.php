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
<style>
/* --- STYLING KHUSUS UNTUK FORM TAMBAH/EDIT PRODUK (Mengacu image_ce99d8.png) --- */

/* CATATAN: 
   Asumsi layout induk (layouts.navbar) memberikan latar belakang biru
   gelap di sebelah kiri (sidebar) dan latar belakang abu-abu gelap
   untuk konten utama, menyerupai wireframe. 
   Jika tidak, Anda perlu menambahkan styling untuk elemen body/main.
*/

.form-container {
    max-width: 600px;
    width: 90%; 
    position: fixed; 
    top: 50%;
    left: 50%;
    transform: translate(-50%, -50%);
    margin: 0;
    padding: 40px;
    background-color: #A3AABF; 
    border-radius: 20px;
    border: 2px solid white; 
    box-shadow: 0 4px 15px rgba(0, 0, 0, 0.3);
    backdrop-filter: none;
}

.form-header {
    display: flex;
    justify-content: space-between;
    align-items: center;
    margin-bottom: 30px; /* Jarak yang lebih besar */
    padding-bottom: 0;
    border-bottom: none; /* Menghapus border bawah header */
}

.form-title {
    /* Judul di wireframe sepertinya tidak ada, tapi di kode ada. 
       Kita pertahankan tapi sesuaikan warnanya jika perlu. */
    color: #2F3249; /* Warna teks gelap */
    font-size: 1.5rem;
    font-weight: 700;
    /* Di wireframe, hanya ada tombol KEMBALI di pojok kanan atas form */
    display: none; /* Sembunyikan judul jika ingin benar-benar mirip wireframe */
}

/* Tombol KEMBALI di pojok kanan atas area form */
.btn-kembali {
    padding: 6px 15px; /* Lebih kecil */
    background-color: #6683B1; /* Warna tombol Kembali di desain */
    color: white;
    text-decoration: none;
    border-radius: 8px; /* Sudut lebih melengkung */
    font-weight: 600;
    font-size: 0.9em;
    transition: background-color 0.2s;
    /* Penempatan di pojok kanan atas form-container (relatif ke container) */
    position: absolute;
    top: 20px;
    right: 30px;
}
.btn-kembali:hover {
    background-color: #465C88;
}

.form-group {
    margin-bottom: 30px; /* Jarak antar input field lebih besar */
}

.form-group label {
    display: block;
    color: #2F3249; /* Warna teks label gelap */
    font-weight: 600;
    margin-bottom: 8px;
    font-size: 1.1em;
}

/* Input Fields menyerupai blok biru panjang di wireframe */
.form-input, .form-select {
    width: 100%;
    padding: 18px; /* Padding lebih besar */
    border: none;
    border-radius: 10px; /* Sudut sedikit membulat */
    background-color: #465C88; /* Warna input sesuai desain */
    color: white;
    font-size: 1.1em;
    box-shadow: none; /* Hapus box shadow inset */
    box-sizing: border-box; 
}
.form-input::placeholder {
    color: rgba(255, 255, 255, 0.6);
}

/* Styling Khusus Dropdown/Select (di kode ini tidak ada select, tapi tetap dipertahankan) */
.form-select {
    appearance: none; 
    background-image: url("data:image/svg+xml;charset=UTF-8,%3csvg xmlns='http://www.w3.org/2000/svg' viewBox='0 0 20 20' fill='%23ffffff'%3e%3cpath fill-rule='evenodd' d='M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z' clip-rule='evenodd'/%3e%3c/svg%3e");
    background-repeat: no-repeat;
    background-position: right 15px center;
    padding-right: 40px;
}

/* Tombol SIMPAN */
.btn-simpan {
    /* Sesuaikan dengan dimensi 89x21 di wireframe (perkiraan) */
    padding: 10px 25px; /* Lebih kecil */
    background-color: #6683B1; /* Menggunakan warna yang sama dengan tombol KEMBALI */
    color: white;
    border: none;
    border-radius: 8px;
    font-weight: 700;
    cursor: pointer;
    transition: background-color 0.2s;

    float: right; /* Pindahkan ke kanan */
}
.btn-simpan:hover {
    background-color: #465C88;
}

.error-message {
    color: #cc0000; /* Warna error yang lebih menonjol */
    margin-top: 5px;
    font-size: 0.9em;
}

/* Perbaikan penempatan tombol KEMBALI jika .form-container adalah parent */
.edit-form {
    position: relative;
}

</style>