<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>{{ config('app.name', 'Laravel') }}</title>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;600;700&display=swap" rel="stylesheet">
    
    <style>
        body {
            font-family: 'Poppins', sans-serif;
            background-color: #7F8CAA;
        }
        /* Menggantikan flex h-screen overflow-hidden */
        .main-layout {
            display: flex;
            height: 100vh;
            overflow: hidden; 
            /* Catatan: bg-gray-200 dari body tetap aktif */
        }

        /* Menggantikan w-64 bg-blue-900 shadow-xl flex flex-col */
        .sidebar {
            width: 256px;
            background-color: #6683B1; /* Warna biru gelap */
            box-shadow: 2px 0 5px rgba(0, 0, 0, 0.1);
            display: flex;
            flex-direction: column;
            padding: 0;
        }

        /* Menggantikan p-6 text-white text-2xl font-bold tracking-widest border-b border-blue-800 */
        .sidebar-header {
            padding: 24px;
            color: #ffffff;
            font-size: 1.5rem; /* 2xl */
            font-weight: bold;
            letter-spacing: 0.05em; /* tracking-widest */
            border-bottom: 1px solid #3f51b5;
        }

        .logo {
            width: 82px; /* Ukuran yang pas untuk sidebar */
            height: 82px;
            display: block;
            margin: 0 auto;
        }

        /* Menggantikan flex-grow p-4 space-y-2 */
        .sidebar-nav {
            flex-grow: 1;
            padding: 16px;
            display: flex;
            flex-direction: column;
            gap: 8px; /* space-y-2 */
        }

        /* Styling Nav Item (menggantikan block px-4 py-2 text-white font-medium rounded-lg transition duration-150 ease-in-out) */
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
            background-color: #3f51b5; /* Warna hover (mirip blue-800/700) */
        }

        /* Untuk item aktif (akan ditambahkan secara dinamis oleh Blade) */
        .nav-item.active {
            background-color: #465C88; /* Warna aktif (mirip bg-blue-700) */
            font-weight: bold;
        }
        
        /* Menggantikan p-4 mt-auto */
        .sidebar-footer {
            padding: 16px;
            margin-top: auto;
        }

        /* Styling Logout Button (menggantikan w-full px-4 py-2 bg-blue-800 text-white font-semibold rounded-lg hover:bg-blue-700 transition duration-150 ease-in-out) */
        .logout-btn {
            width: 100%;
            padding: 8px 16px;
            background-color: #303f9f; /* Warna tombol (mirip blue-800) */
            color: white;
            font-weight: 600;
            border: none;
            border-radius: 8px;
            cursor: pointer;
            transition: background-color 0.2s;
        }

        .logout-btn:hover {
            background-color: #3f51b5; /* Warna hover */
        }

        /* Menggantikan flex-1 p-8 overflow-y-auto bg-gray-200 */
        .main-content {
            flex-grow: 1;
            padding: 32px;
            overflow-y: auto;
            /* background-color: #edf2f7; (bg-gray-200) sudah ada di <body> */
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
                <a href="{{ route('admin.dashboard') }}" 
                   class="nav-item {{ $currentPath === 'admin/dashboard' ? 'active' : '' }}">
                    DASHBOARD
                </a>

                <a href="{{ route('admin.produk') }}" 
                   class="nav-item {{ $currentPath === 'admin/produk' ? 'active' : '' }}">
                    KELOLA PRODUK
                </a>

                <a href="{{ route('admin.member') }}" 
                   class="nav-item {{ $currentPath === 'admin/member' ? 'active' : '' }}">
                    KELOLA MEMBER
                </a>
                
                <a href="" 
                   class="nav-item {{ $currentPath === 'admin/discounts' ? 'active' : '' }}">
                    KELOLA DISKON
                </a>
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