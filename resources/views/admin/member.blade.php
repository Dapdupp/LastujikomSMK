@extends('layouts.navbar')
@section('content')

<h1 class="content-header">DASHBOARD (KELOLA MEMBER)</h1>
<P class="content-subtitle">Kelola member yang daftar</P>

<div class="member-management-container">
    <div class="member-header-controls">
        <input type="text" placeholder="Cari Member..." class="search-input">
    </div>

    <table class="member-table">
        <thead>
            <tr>
                <th>Nama</th>
                <th>No Hp</th>
                <th>Tanggal Daftar</th>
                <th>Total Transaksi</th>
                <th>Aksi</th>
            </tr>
        </thead>
    </table>
</div>



@endsection

<style>
    /* --- Styles for Product Management (Kelola Produk) --- */

    /* Container Utama */
    .member-management-container {
        background-color: transparent;
        padding: 25px;
        border-radius: 12px;
        border: 1px solid rgba(255, 255, 255, 0.4);
        box-shadow: none;
        min-height: 70vh;
    }

    /* Header dan Kontrol */
    .member-header-controls {
        display: flex;
        justify-content: space-between;
        align-items: center;
        margin-bottom: 20px;
        background-color: rgba(0, 0, 0, 0.2);
        padding: 15px;
        border-radius: 8px;
    }

    /* Input Pencarian */
    .search-input {
        padding: 10px 15px;
        border-radius: 20px;
        border: 1px solid rgba(255, 255, 255, 0.3);
        background-color: rgba(255, 255, 255, 0.1);
        color: white;
        width: 1100px;
        font-family: 'Poppins', sans-serif;
        transition: background-color 0.3s;
    }

    .search-input::placeholder {
        color: rgba(255, 255, 255, 0.7);
    }

    /* Tombol Tambah Produk */
    .add-product-btn {
        text-decoration: none; /* HILANGKAN GARIS BAWAH */
        display: inline-flex;
        align-items: center;
        gap: 5px;
        padding: 10px 20px;
        border-radius: 20px;
        border: none;
        font-family: 'Poppins', sans-serif;
        background-color: #3f51b5; 
        color: white;
        font-weight: 500;
        cursor: pointer;
        transition: background-color 0.3s;
    }
    /* Table Styling */
    .member-table {
        width: 100%;
        border-collapse: collapse;
        margin-top: 15px;
        background-color: transparent;
        border-radius: 8px;
        overflow: hidden;
    }

    .member-table th,
    .member-table td {
        padding: 15px 15px;
        text-align: center;
        color: #ffffff;
    }

    .member-table thead th {
        background-color: rgba(0, 0, 0, 0.3); /* Latar belakang header lebih gelap */
        color: #ffffff;
        font-weight: 600;
        text-transform: uppercase;
    }

    .product-table tbody tr {
        border-bottom: 1px solid rgba(255, 255, 255, 0.3);
        background-color: transparent;
        transition: background-color 0.2s;
    }

    .product-table tbody tr:hover {
        background-color: rgba(255, 255, 255, 0.15);
    }

    .product-table tbody tr:last-child {
        border-bottom: none;
    }

    /* Aksi Tombol (Edit & Delete) */
    
    /* Sel yang menampung tombol aksi */
    .action-cell {
        display: flex; /* Menggunakan flexbox untuk menata tombol */
        gap: 8px; /* Jarak antar tombol */
        align-items: center;
    }

    /* Form Delete agar tidak mengganggu layout */
    .delete-form {
        display: inline-block;
        margin: 0;
    }

    /* Kelas Umum untuk Tombol Aksi */
    .action-btn {
        display: inline-block;
        padding: 6px 12px;
        border-radius: 5px;
        font-family: 'Poppins', sans-serif;
        font-size: 0.9em;
        font-weight: 500;
        cursor: pointer;
        text-align: center;
        text-decoration: none; /* HILANGKAN GARIS BAWAH untuk semua action-btn */
        transition: background-color 0.2s, opacity 0.2s;
        border: 1px solid transparent; /* Border default transparan */
        line-height: 1.2;
    }

    /* Tombol Edit (Ubah) */
    .edit-btn {
        background-color: #2196F3; /* Biru Primer */
        color: white;
    }

    .edit-btn:hover {
        background-color: #1976D2;
    }

    /* Tombol Hapus */
    .delete-btn {
        background-color: #F44336; /* Merah */
        color: white;
        /* Karena ini adalah <button> di dalam <form>, tidak perlu `text-decoration: none` */
    }

    .delete-btn:hover {
        background-color: #D32F2F;
    }

    /* Pagination */
    .pagination-links nav {
        display: flex;
        justify-content: center;
    }

    .pagination-links .flex.justify-between.flex-1 {
        display: none; /* Sembunyikan navigasi default jika tidak diperlukan */
    }

    .pagination-links svg {
        width: 20px;
        height: 20px;
        fill: white;
    }

    .pagination-links span, .pagination-links a {
        color: white !important;
        background-color: rgba(255, 255, 255, 0.1);
        border: 1px solid rgba(255, 255, 255, 0.4);
        padding: 5px 10px;
        margin: 0 4px;
        border-radius: 4px;
        text-decoration: none;
    }

    .pagination-links span.bg-gray-800 {
        background-color: #3f51b5;
        border-color: #3f51b5;
    }
</style>
