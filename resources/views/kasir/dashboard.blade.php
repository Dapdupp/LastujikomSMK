@extends('layouts.navbarkasir')
@section('content')
    <div class="p-4">
        <h2 class="text-3xl font-bold text-gray-800"> Halo, Kasir! </h2>
    </div>
<style>
    /* CSS tambahan untuk Card Statistik */
    .stats-card-container {
        /* Menggantikan card dari gambar Anda (misalnya: warna background yang lebih terang dari sidebar) */
        background-color: #A0B2C9; /* Warna biru keabuan terang, dekat dengan warna sidebar */
        border-radius: 12px; /* Melengkung di sudut (seperti gambar) */
        padding: 20px;
        box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
        text-align: center;
        margin-bottom: 30px; /* Jarak dari elemen di bawahnya */
    }

    .stats-card-title {
        font-size: 1.25rem; /* Ukuran judul */
        font-weight: 600;
        color: #000000;
        margin-bottom: 15px;
        border-bottom: 1px solid rgba(0, 0, 0, 0.1); /* Garis tipis di bawah judul */
        padding-bottom: 5px;
    }

    .stats-row {
        display: flex;
        justify-content: space-around; /* Memastikan distribusi rata antar kolom */
        align-items: center;
        gap: 20px; /* Jarak antar kolom */
    }

    .stat-item {
        flex: 1; /* Memastikan setiap item mengambil ruang yang sama */
        color: #000000;
        padding: 5px 0;
    }

    .stat-number {
        font-size: 2.2rem; /* Angka besar */
        font-weight: 700;
        line-height: 1.2;
    }

    .stat-label {
        font-size: 0.9rem; /* Label kecil di bawah angka */
        font-weight: 400;
        opacity: 0.8;
    }
</style>    
    <div class="stats-card-container">
        <div class="stats-card-title">
            TRANSAKSI HARI INI
        </div>
        <div class="stats-row">
            <div class="stat-item">
                <div class="stat-label"></div>
            </div>
            <div class="stat-item">
                <div class="stat-label"></div>
            </div>
            <div class="stat-item">
                <div class="stat-label"></div>
            </div>
        </div>
    </div>
@endsection