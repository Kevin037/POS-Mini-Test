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

class ProdukController extends Controller
{
  public function __construct()
    {
        $this->middleware('auth');
    }

    public function home ()
    {
        $kategori = Kategori::pluck('nama_kategori','id');

        $produk=
        DB::table('produk')
        // ->orderBy('created_at', 'DESC')
        ->join('kategori','produk.kategori_id','=','kategori.id')
        ->select('produk.*','kategori.nama_kategori')
        ->get();

        return view('admin.produk',compact('produk','kategori'));
    }

    public function tambah(Request $request){

      $id_max=Produk::max('id');
      $id_new=$id_max+1;
      $kode='#IT'.$id_new;
          // dd( $request->file('gambar_bukti'));
          $input = $request->all();
          $request->validate([
            'bill' => 'image|mimes:jpg,jpeg,png|max:900'
          ]);

        $produk = new Produk;
        $produk->kode_produk = $kode;
        $produk->nama_produk = $request->nama_produk;
        $produk->kategori_id = $request->kategori_id;
        $produk->harga_beli = $request->harga_beli;
        $produk->harga_jual = $request->harga_jual;
        $produk->stok = $request->stok;
        $produk->deskripsi_produk = $request->deskripsi_produk;
        $produk->user_id = auth()->user()->id;
        $image = $request->file('bill');
        $nama_gambar = $image->getClientOriginalName();
        $image->move('img/produk/',$nama_gambar);
        $input['bill'] = $image->getClientOriginalName();
        $produk->gambar_produk = $nama_gambar;
        $produk->save(); 

        // toast('produk berhasil ditambahkan','success');
        return redirect('/produk')->with('toast_success', 'Produk berhasil ditambahkan');
    }
    
    public function form_edit ($id)
    {
        $kategori = Kategori::pluck('nama_kategori','id');

        $produk_id=
        DB::table('produk')
        ->where('id',$id)
        ->select('produk.*')
        ->get();

        return view('admin.form-edit-produk',compact('produk_id','kategori'));
    }

    public function ubah(Request $request, $id){
        $produk=Produk::find($id);
        $input = $request->all();
          // dd( $request->file('gambar_bukti'));
          $request->validate([
            'bill' => 'image|mimes:jpg,jpeg,png|max:900'
          ]);
            $image = $request->file('bill');
            File::delete('img/produk/'.$produk->gambar_produk);
            $nama_gambar = $image->getClientOriginalName();
            $image->move('img/produk/',$nama_gambar);
            $input['bill'] = $image->getClientOriginalName();

            $user_id=auth()->user()->id;
        $ubah_produk=DB::table('produk')
        ->where('id','like',$id)
        ->update([
            'nama_produk' => $request->nama_produk,
            'kategori_id' => $request->kategori_id,
            'harga_beli' => $request->harga_beli,
            'harga_jual' => $request->harga_jual,
            'stok' => $request->stok,
            'deskripsi_produk' => $request->deskripsi_produk,
            'user_id' => $user_id,
            'gambar_produk' => $nama_gambar,
        ]);

        return redirect('/produk')->with('toast_success', 'Data Produk berhasil diubah');
    }

    public function hapus($id){

      $penjualan=DB::table('penjualan')
      ->where('produk_id',$id)
      ->count();

      $pembelian=DB::table('pembelian')
      ->where('produk_id',$id)
      ->count();

      if ($penjualan == 0) {
        toast('Data sedang digunakan,
                Hapus data gagal!','error');
        return back();
        
      }
      if ($pembelian == 0) {
        toast('Data sedang digunakan,
                Hapus data gagal!','error');
        return back();
        
      }
      $produk=Produk::find($id);
          $produk->delete();
          return back()->with('toast_success', 'Data Produk berhasil dihapus');    
  }
  public function laporan_pembelian ()
    {
        $kategori = Kategori::pluck('nama_kategori','id');

        $produk=
        DB::table('produk')
        // ->orderBy('created_at', 'DESC')
        ->join('kategori','produk.kategori_id','=','kategori.id')
        ->select('produk.*','kategori.nama_kategori')
        ->get();

        return view('admin.laporan_pembelian_produk',compact('produk','kategori'));
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

        return view('admin.laporan_penjualan_produk',compact('produk','kategori'));
    }

    public function detail_penjualan($id){
      $penjualan=
        DB::table('penjualan')
        ->where('produk_id',$id)
        ->join('produk','penjualan.produk_id','=','produk.id')
        ->join('pelanggan','penjualan.pelanggan_id','=','pelanggan.id')
        ->select('penjualan.*','produk.nama_produk','pelanggan.nama_pelanggan')
        ->get();

        return view('admin.detail_penjualan_produk',compact('penjualan'));
    }

    public function detail_pembelian($id){
      $pembelian=
        DB::table('pembelian')
        ->where('produk_id',$id)
        ->join('produk','pembelian.produk_id','=','produk.id')
        ->join('supplier','pembelian.supplier_id','=','supplier.id')
        ->select('pembelian.*','produk.nama_produk','supplier.nama_supplier')
        ->get();

        return view('admin.detail_pembelian_produk',compact('pembelian'));
    }
  
}
