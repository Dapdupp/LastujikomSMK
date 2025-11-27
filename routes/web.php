    <?php

    use Illuminate\Support\Facades\Route;
    use Illuminate\Support\Facades\Auth;
    use App\Http\Controllers\Auth\LoginController;
    use App\Http\Controllers\admin\ProductController;
    use App\Http\Controllers\kasir\KasirDashboardController;

    // --------------------------------------------------------------------------
    // 1. ROUTE ROOT (INDEX)
    // --------------------------------------------------------------------------

    // Redireksi cerdas: Jika sudah login, pergi ke dashboard sesuai role; jika belum, ke login.
    Route::get('/', function () {
        if (Auth::check()) {
            $user = Auth::user();
            // Langsung return redirect() di sini
            if ($user->role === 'admin') {
                return redirect()->route('admin.dashboard');
            } else {
                return redirect()->route('kasir.dashboard');
            }
        }
        // Jika belum login, redirect ke halaman login
        return redirect()->route('login');
    })->name('root'); // Beri nama untuk kemudahan

    // --------------------------------------------------------------------------
    // 2. GUEST ROUTES (Login)
    // --------------------------------------------------------------------------
    Route::middleware('guest')->group(function () {
        Route::get('/login', [LoginController::class, 'showLoginForm'])->name('login');
        Route::post('/login', [LoginController::class, 'login']);
    });

    // --------------------------------------------------------------------------
    // 3. AUTH ROUTES (Terproteksi)
    // --------------------------------------------------------------------------
    Route::middleware('auth')->group(function () {
        // Logout
        Route::post('/logout', [LoginController::class, 'logout'])->name('logout');

        // Dashboard admin
        Route::get('/admin/dashboard', function () {
            return view('admin.dashboard');
        })->name('admin.dashboard');

        // Dashboard kasir
        Route::prefix('kasir')->name('kasir.')->group(function () {
    
    // 1. DASHBOARD
    // URL: /kasir/dashboard | Nama Route: kasir.dashboard
    Route::get('/dashboard', [KasirDashboardController::class, 'dashboard'])->name('dashboard');
    
    // 2. TRANSAKSI (INI YANG MEMBUAT ERROR)
    // URL: /kasir/transaksi | Nama Route: kasir.transaksi
    Route::get('/transaksi', [KasirDashboardController::class, 'transaksi'])->name('transaksi');
    
    // 3. TAMBAH MEMBER
    // URL: /kasir/add-member | Nama Route: kasir.add-member
    Route::get('/add-member', [KasirDashboardController::class, 'addMember'])->name('add-member');
    
    // 4. LIHAT PRODUK
    // URL: /kasir/view-products | Nama Route: kasir.view-products
    Route::get('/view-products', [KasirDashboardController::class, 'viewProducts'])->name('view-products');
});

        // ------------------------------------
        // CRUD PRODUK (INTEGRASI DENGAN ProductController)
        // ------------------------------------
        // Menggunakan Resource Route untuk semua operasi CRUD (Create, Read, Update, Delete)
        // Semua route ini otomatis terproteksi oleh middleware('auth')
        Route::resource('products', ProductController::class)->except(['show', 'index'])->names('products');
        // Route Index dan Show kita tempatkan di bawah prefix 'admin' atau 'kasir'
        // jika kita ingin membatasi akses READ.
        // Route Index Produk (Daftar Produk)
        Route::get('/admin/produk', [ProductController::class, 'index'])->name('admin.produk');
        // Route Form Tambah Produk (sudah didefinisikan di atas, kita arahkan ke Controller)
        Route::get('/produk/formTambahProduk', [ProductController::class, 'create'])->name('admin.formTambahProduk');
        // Contoh: Route Form Edit Produk
        Route::get('/produk/formUpdateProduk/{id}', [ProductController::class, 'edit'])->name('formedit');
        Route::put('/produk/formUpdateProduk/{id}', [ProductController::class, 'update'])->name('edit');


    });
