<?php

namespace App\Http\Controllers\kasir;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class KasirDashboardController extends Controller
{
    public function dashboard()
    {
        return view('kasir.dashboard');
    }

        public function transaksi()
    {
        return view('kasir.transaksi');
    }
}


