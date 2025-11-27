<?php

namespace App\Http\Controllers;

use App\Models\Product; // Pastikan Model Product diimpor
use App\Models\Products;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB; // Diperlukan untuk query data transaksi
use App\Models\TransactionItem; // Opsional: jika Anda ingin menggunakan Eloquent

class AdminDashboardController extends Controller
{
    public function index()
    {
        // 1. Ambil data produk untuk Laporan Stok
        // Eager load relasi transactionItems agar Accessor currentStock efisien
        $products = Products::with('transactionItems')->get();

        // 2. Ambil Transaksi Terbaru (5 transaksi terakhir)
        // INI ADALAH BAGIAN YANG HARUS DIDEFINISIKAN UNTUK MENGHILANGKAN ERROR
        // Kita menggunakan Query Builder untuk contoh ini:
        $latestTransactions = DB::table('transaction_items')
            // Ambil data yang relevan
            ->select('transaction_id', 'product_id', 'subtotal', 'created_at')
            ->orderByDesc('created_at')
            ->limit(5)
            ->get();
            
        // 3. Data Ringkasan (Anda bisa menyesuaikan logikanya)
        $totalProducts = Products::count();
        
        // Asumsi data ini diambil dari tabel users/members yang ada
        $totalCashiers = 2; 
        $totalMembers = 50; 
        
        // Contoh: Total Transaksi unik hari ini
        $totalTransactionsToday = DB::table('transaction_items')
            ->whereDate('created_at', now()->toDateString())
            ->distinct('transaction_id')
            ->count('transaction_id'); 

        // 4. Meneruskan SEMUA variabel ke View
        return view('admin.dashboard', [
            'products' => $products,
            'latestTransactions' => $latestTransactions, // ✅ VARIABEL SUDAH DIKIRIM
            'totalCashiers' => $totalCashiers,
            'totalProducts' => $totalProducts,
            'totalMembers' => $totalMembers,
            'totalTransactionsToday' => $totalTransactionsToday,
        ]);
    }
}