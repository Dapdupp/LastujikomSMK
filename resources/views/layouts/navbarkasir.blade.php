<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>{{ config('app.name', 'Laravel') }} - Kasir</title>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;600;700&display=swap" rel="stylesheet">
    
    <style>
        /* --- CSS yang Sudah Ada (SAMA PERSIS) --- */
        body {
            font-family: 'Poppins', sans-serif;
            background-color: #7F8CAA;
        }
        .main-layout {
            display: flex;
            height: 100vh;
            overflow: hidden; 
        }

        .sidebar {
            width: 256px;
            background-color: #6683B1; /* Warna biru gelap */
            box-shadow: 2px 0 5px rgba(0, 0, 0, 0.1);
            display: flex;
            flex-direction: column;
            padding: 0;
        }

        .sidebar-header {
            padding: 24px;
            color: #ffffff;
            font-size: 1.5rem; 
            font-weight: bold;
            letter-spacing: 0.05em; 
            border-bottom: 1px solid #3f51b5;
        }

        .logo {
            width: 82px; 
            height: 82px;
            display: block;
            margin: 0 auto;
        }

        .sidebar-nav {
            flex-grow: 1;
            padding: 16px;
            display: flex;
            flex-direction: column;
            gap: 8px; 
        }

        .nav-item {
            display: block;
            padding: 10px 16px;
            color: #000000;
            text-decoration: none;
            font-weight: 500;
            border-radius: 8px;
            transition: background-color 0.2s;
        }

        .nav-item:hover {
            background-color: #3f51b5; 
        }

        .nav-item.active {
            background-color: #465C88; 
            font-weight: bold;
        }
        
        .sidebar-footer {
            padding: 16px;
            margin-top: auto;
        }

        .logout-btn {
            width: 100%;
            padding: 8px 16px;
            background-color: #303f9f; 
            color: white;
            font-weight: 600;
            border: none;
            border-radius: 8px;
            cursor: pointer;
            transition: background-color 0.2s;
        }

        .logout-btn:hover {
            background-color: #3f51b5; 
        }

        .main-content {
            flex-grow: 1;
            padding: 32px;
            overflow-y: auto;
        }
    </style>
</head>
<body class="bg-gray-200">

    <div class="main-layout">
        
        <div class="sidebar">
            
            <div class="sidebar-header">
                <img src="{{ asset('img/Blue_Dark_Minimalist_Initial_K_Letter_Logo-removebg-preview.png') }}" 
                alt="logo aplikasi" class="logo">
            </div>
            
            <nav class="sidebar-nav">
                
                @php 
                    // Tentukan rute saat ini untuk menandai item aktif
                    $currentPath = Request::path();
                @endphp
                
                {{-- MENU UNTUK KASIR --}}
                <a href="{{ route('kasir.dashboard') }}" 
                    class="nav-item {{ $currentPath === 'kasir/dashboard' ? 'active' : '' }}">
                    DASHBOARD
                </a>

                <a href="{{ route('kasir.transaksi') }}" 
                    class="nav-item {{ $currentPath === 'kasir/transaksi' ? 'active' : '' }}">
                    TRANSAKSI
                </a>
                
                <a href="{{ route('kasir.add_member') }}" 
                    class="nav-item {{ $currentPath === 'cashier/add_member' ? 'active' : '' }}">
                    TAMBAH MEMBER
                </a>
                
                <a href="" 
                    class="nav-item {{ $currentPath === 'cashier/view-products' ? 'active' : '' }}">
                    LIHAT PRODUK
                </a>

                {{-- Catatan: Menu Lain (Kelola User, Diskon) Dihapus dari layout Kasir --}}
            </nav>
            
            <div class="sidebar-footer">
                <form method="POST" action="{{ route('logout') }}">
                    @csrf
                    <button type="submit" class="logout-btn">
                        LOGOUT
                    </button>
                </form>
            </div>
        </div>
        <main class="main-content">
            @yield('content')
        </main>
    </div>

</body>
</html>