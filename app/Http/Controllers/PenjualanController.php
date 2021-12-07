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
use Illuminate\Support\Facades\DB;
Use Alert;

class PenjualanController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function home ()
    {
        $kategori = Kategori::pluck('nama_kategori','id');
        $pelanggan = Pelanggan::pluck('nama_pelanggan','id');

        $penjualan=
        DB::table('penjualan')
        // ->orderBy('created_at', 'DESC')
        ->join('produk','penjualan.produk_id','=','produk.id')
        ->join('pelanggan','penjualan.pelanggan_id','=','pelanggan.id')
        ->select('penjualan.*','produk.nama_produk','pelanggan.nama_pelanggan')
        ->get();
    
        return view('admin.penjualan',compact('penjualan','kategori','pelanggan'));
    }

    public function kasir(){
        return view('user.kasir');
    }

    public function tambah(Request $request){
        date_default_timezone_set('Asia/Jakarta');
        $waktu=Date('yy-m-d H:i');

            $id_max=Penjualan::max('id');
            $id_new=$id_max+1;
            $kode_penjualan='#PJL'.$id_new;

            $jumlah_penjualan=$request->jumlah_penjualan;
            $nominal_penjualan=$request->nominal_penjualan;
            $harga_beli=$request->harga_beli;
            $net_profit=$nominal_penjualan-($harga_beli*$jumlah_penjualan);

            $penjualan= new Penjualan;
            $penjualan->tgl_penjualan=$waktu;
            $penjualan->kode_penjualan=$kode_penjualan;
            $penjualan->produk_id=$request->produk_id;
            $penjualan->jumlah_penjualan=$jumlah_penjualan;
            $penjualan->nominal_penjualan=$nominal_penjualan;
            $penjualan->uang_diterima=$request->uang_diterima;
            $penjualan->uang_kembali=$request->uang_kembali;
            $penjualan->net_profit=$net_profit;
            $penjualan->pelanggan_id=$request->pelanggan_id;
            $penjualan->user_id=auth()->user()->id;
            $penjualan->save();

            return redirect('/home-user')->with('toast_success', 'Transaksi berhasil,
            Pesanan anda segera diproses, Terimakasih.');
    }
    public function invoice(){
        return view('user.invoice');
    }

    // public function kasir(){
    //     date_default_timezone_set('Asia/Jakarta');
    //     $waktu=Date('yy-m-d H:i');

    //     $id_max=Invoice::max('id');
    //     $id_new=$id_max+1;
    //     $kode_invoice='#INV'.$id_new;

    //     $nama=$request->nama;
    //     $jumlah = $request->jumlah;
    //     $harga = $request->harga;
    //     $jumlah_penjualan=$request->jumlah_penjualan;

    //     for ($i=0; $i < count($nama) ; $i++) { 
    //         $id_max=Penjualan::max('id');
    //         $id_new=$id_max+1;
    //         $kode='#JL'.$id_new;

    //         // $produk_id =$nama;
    //         // $stok=DB::table('produk')
    //         // ->where('id','like',$produk_id)
    //         // ->select('produk.*')
    //         // ->get();

    //         // foreach ($stok as $stok ) {
    //         //     $stoklama =  $stok->stok ;
    //         // }

    //         // if($jumlah_penjualan>$stoklama){
    //         //     toast('Jumlah melebihi stok,
    //         //     Silakan ulangi pesanan!','error');
    //         //     return back();
    //         // }
    //         // $stok_baru=$stoklama-$jumlah_penjualan;

    //         // $ubah_stok=DB::table('produk')
    //         // ->where('id','like',$produk_id)
    //         // ->update([
    //         //     'stok' => $stok_baru,
    //         // ]);

    //         $penjualan= new Penjualan;
    //         $penjualan->kode_penjualan=$kode;
    //         $penjualan->produk_id=$nama[$i];
    //         $penjualan->jumlah_penjualan=$jumlah[$i];
    //         $penjualan->nominal_penjualan=$harga[$i];
    //         $penjualan->invoice_id=$kode_invoice;
    //         $penjualan->save();
    //     }
        
    //     $invoice = new Invoice;
    //     $invoice->kode_invoice=$kode_invoice;
    //     $invoice->tgl_penjualan = $waktu;
    //     $invoice->net_profit = '23';
    //     $invoice->pelanggan_id = '2342';
    //     $invoice->user_id = auth()->user()->id;
    //     $invoice->save(); 
    // }

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
                    ->pluck('harga_produk','id');
        return json_encode($pilihan_produk);
    }
    public function tampilstok($id)
    {
        $pilihan_produk = DB::table('produk')
                    ->where('id','=',$id)
                    ->pluck('stok','id');
        return json_encode($pilihan_produk);
    }
    public function form($id){
        // $produk=Produk::find('id');
        $pelanggan=Pelanggan::pluck('nama_pelanggan','id');

        $produk=DB::table('produk')
        ->where('id',$id)
        ->select('produk.*')
        ->get();
        return view ('user.form-pemesanan',compact('produk','pelanggan'));
    }
     
    public function alamat_pelanggan(){
        $alamat=Pelanggan::pluck('alamat_pelanggan','id');
        return json_encode($alamat);
    }
    public function laporan(){
        $penjualan=
        DB::table('penjualan')
        ->join('produk','penjualan.produk_id','=','produk.id')
        ->join('pelanggan','penjualan.pelanggan_id','=','pelanggan.id')
        ->select('penjualan.*','produk.nama_produk','pelanggan.nama_pelanggan')
        ->get();

        return view('admin.laporan_penjualan',compact('penjualan'));
    }
}
