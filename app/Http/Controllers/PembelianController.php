<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Kategori;
use App\Models\Produk;
use App\Models\Supplier;
use App\Models\Pelanggan;
use App\Models\Pembelian;
use App\Models\Penjualan;
use Illuminate\Support\Facades\DB;
use File;

class PembelianController extends Controller
{
    public function home ()
    {
        // $produk = Produk::pluck('nama_produk','id');
        $kategori = Kategori::pluck('nama_kategori','id');
        $supplier = Supplier::pluck('nama_supplier','id');

        $pembelian=
        DB::table('pembelian')
        // ->orderBy('created_at', 'DESC')
        ->join('produk','pembelian.produk_id','=','produk.id')
        ->join('supplier','pembelian.supplier_id','=','supplier.id')
        ->select('pembelian.*','produk.nama_produk','supplier.nama_supplier')
        ->get();

        return view('admin.pembelian',compact('pembelian','kategori','supplier'));
    }

    public function tambah(Request $request){
        $produk_id =$request->produk_id;
        $stok=DB::table('produk')
        ->where('id','like',$produk_id)
        ->select('produk.*')
        ->get();

        foreach ($stok as $stok ) {
            $stoklama =  $stok->stok ;
        }

        date_default_timezone_set('Asia/Jakarta');
        $waktu=Date('yy-m-d H:i');
        $jumlah_pembelian=$request->jumlah_pembelian;
        $stok_baru=$stoklama+$jumlah_pembelian;

        $ubah_stok=DB::table('produk')
        ->where('id','like',$produk_id)
        ->update([
            'stok' => $stok_baru,
        ]);

        $id_max=Pembelian::max('id');
        $id_new=$id_max+1;
        $kode_pembelian='#PBL'.$id_new;

        $pembelian = new Pembelian;
        $pembelian->tgl_pembelian = $waktu;
        $pembelian->kode_pembelian = $kode_pembelian;
        $pembelian->produk_id = $produk_id;
        $pembelian->jumlah_pembelian = $jumlah_pembelian;
        $pembelian->nominal_pembelian = $request->nominal_pembelian;
        $pembelian->supplier_id = $request->supplier_id;
        $pembelian->user_id = '1';
        $pembelian->save(); 

        return redirect('/pembelian');
    }

    public function pilih($id)
    {
        $pilihan_produk = DB::table('produk')
                    ->where('kategori_id','=',$id)
                    ->pluck('nama_produk','id');
        return json_encode($pilihan_produk);
    }

    public function harga($id)
    {
        $pilihan_produk = DB::table('produk')
                    ->where('id','=',$id)
                    ->pluck('harga_beli','id');
        return json_encode($pilihan_produk);
    }

    public function laporan(){
        $pembelian=
        DB::table('pembelian')
        ->join('produk','pembelian.produk_id','=','produk.id')
        ->join('supplier','pembelian.supplier_id','=','supplier.id')
        ->select('pembelian.*','produk.nama_produk','supplier.nama_supplier')
        ->get();

        return view('admin.laporan_pembelian',compact('pembelian'));
    }
}
