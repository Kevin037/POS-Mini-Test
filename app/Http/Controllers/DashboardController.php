<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use Illuminate\Http\Request;
use App\Transaksi_produk;
use App\Transaksi_jasa;
use DB;
use Illuminate\Support\Collection;

class DashboardController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function home ()
    {
        $produk = 
        DB::table('produk')
        ->count();

        $supplier = 
        DB::table('supplier')
        ->count();

        $pelanggan = 
        DB::table('pelanggan')
        ->count();

        $pembelian = 
        DB::table('pembelian')
        ->count();

        $penjualan = 
        DB::table('penjualan')
        ->count();

        return view('admin.home',compact('produk','supplier','pelanggan','pembelian','penjualan'));
    }
}
