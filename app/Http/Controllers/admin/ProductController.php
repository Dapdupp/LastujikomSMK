<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Products;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    /**
     * READ: Menampilkan daftar semua produk beserta stok saat ini.
     * (Index - Halaman Utama CRUD)
     */
    public function index()
    {
        // Eager load relasi transactionItems untuk menghindari N+1 query problem.
        // Ini memastikan penghitungan current_stock di accessor berjalan efisien.
        $products = Products::with('transactionItems')->paginate(10);

        // Di sini Anda bisa melihat semua kolom, termasuk current_stock (via accessor)
        return view('admin.produk', compact('products'));
    }

    /**
     * CREATE: Menampilkan form untuk membuat produk baru.
     */
    public function create()
    {
        return view('admin.formTambahProduk');
    }

    /**
     * CREATE: Menyimpan produk baru ke database (Store).
     */
    public function store(Request $request)
    {
        // 1. Validasi Data
        $validatedData = $request->validate([
            'name_products' => 'required|string|max:255',
            'price' => 'required|integer|min:0',
            'initial_stock' => 'required|integer|min:0', // Disimpan sebagai 'initial_stock'
        ]);

        // 2. Simpan ke Database
        Products::create($validatedData);

        return redirect()->route('admin.produk')->with('success', 'Produk berhasil ditambahkan.');
    }

    /**
     * READ: Menampilkan detail satu produk.
     * (Menggunakan Route Model Binding)
     */
    public function show(Products $product)
    {
        // Ketika diakses di sini, $product->current_stock akan otomatis dihitung.
        return view('products.show', compact('product'));
    }

    /**
     * UPDATE: Menampilkan form untuk mengedit produk.
     */
    public function edit(Request $request, $id)
    {
        $product = Products::findOrFail($id);
        return view('admin.formUpdateProduk', compact('product'));
    }

    /**
     * UPDATE: Memperbarui data produk di database.
     */
    public function update(Request $request, Products $productData, $id)
    {
        // 1. Validasi Data
        $validatedData = $request->validate([
            'name_products' => 'required|string|max:255',
            'price' => 'required|integer|min:0',
            // Peringatan: Mengubah initial_stock di sini akan mengubah basis perhitungan stok.
            'initial_stock' => 'required|integer|min:0',
        ]);

        // 2. Perbarui Data
        $product = Products::findOrFail($id);
        $product->update($validatedData);

        return redirect()->route('admin.produk')->with('success', 'Produk berhasil diperbarui.');
    }

    /**
     * DELETE: Menghapus produk dari database (Destroy).
     */
    public function destroy(Products $product)
    {
        // Jika onDelete('cascade') diterapkan di migrasi transaction_items, 
        // semua item transaksi yang terkait juga akan terhapus.
        $product->delete();

        return redirect()->route('admin.produk')->with('success', 'Produk berhasil dihapus.');
    }
}
