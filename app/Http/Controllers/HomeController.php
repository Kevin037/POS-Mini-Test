<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\Kategori;
use App\Models\Produk;
use App\Models\Supplier;
use App\Models\Pelanggan;
use App\Models\Pembelian;
use App\Models\Penjualan;
use App\Models\Invoice;
use DB;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $kategori = Kategori::pluck('nama_kategori','id');

        $produk=Produk::all();
        return view('user.home',compact('produk','kategori'));
    }

    public function filter (Request $request)
    {
        $kategori_id=$request->kategori_id;
        $produk=
        DB::table('produk')
        ->where('kategori_id',$kategori_id)
        ->join('kategori','produk.kategori_id','=','kategori.id')
        ->select('produk.*','kategori.nama_kategori')
        ->get();

       if ($kategori_id != null) {
        $kategori = Kategori::pluck('nama_kategori','id');
        $kategori_id=$request->kategori_id;
        return view('user.home',compact('produk','kategori'));
       }

       $kategori = Kategori::all();
        return view('user.home',compact('produk','kategori'));
    }

    public function laporan(){
        $penjualan=
        DB::table('penjualan')
        ->join('produk','penjualan.produk_id','=','produk.id')
        ->join('pelanggan','penjualan.pelanggan_id','=','pelanggan.id')
        ->select('penjualan.*','produk.nama_produk','pelanggan.nama_pelanggan')
        ->get();

        return view('user.laporan_penjualan',compact('penjualan'));
    }

    public function laporan_penjualan ()
    {
        $kategori = Kategori::pluck('nama_kategori','id');

        $produk=
        DB::table('produk')
        // ->orderBy('created_at', 'DESC')
        ->join('kategori','produk.kategori_id','=','kategori.id')
        ->select('produk.*','kategori.nama_kategori')
        ->get();

        return view('user.laporan_penjualan_produk',compact('produk','kategori'));
    }

    public function detail_penjualan($id){
      $penjualan=
        DB::table('penjualan')
        ->where('produk_id',$id)
        ->join('produk','penjualan.produk_id','=','produk.id')
        ->join('pelanggan','penjualan.pelanggan_id','=','pelanggan.id')
        ->select('penjualan.*','produk.nama_produk','pelanggan.nama_pelanggan')
        ->get();

        return view('user.detail_penjualan_produk',compact('penjualan'));
    }
}
