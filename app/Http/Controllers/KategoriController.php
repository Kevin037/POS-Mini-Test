<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Kategori;
use App\Models\Supplier;
use App\Models\Pelanggan;
use App\Models\Pembelian;
use App\Models\Penjualan;
use Illuminate\Support\Facades\DB;
Use Alert;


class KategoriController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function home ()
    {
        $kategori=
        DB::table('kategori')
        // ->orderBy('created_at', 'DESC')
        ->select('kategori.*')
        ->get();

        return view('admin.kategori',compact('kategori'));
    }

    public function tambah(Request $request){
        $kategori = new Kategori;
        $kategori->nama_kategori = $request->nama_kategori;
        $kategori->user_id = auth()->user()->id;
        $kategori->save(); 

        // toast('Kategori berhasil ditambahkan','success');
        return redirect('/kategori')->with('toast_success', 'Kategori berhasil ditambahkan');
    }    

    public function form_edit ($id)
    {
        $kategori_id=
        DB::table('kategori')
        ->where('id',$id)
        ->select('kategori.*')
        ->get();

        return view('admin.form-edit-kategori',compact('kategori_id'));
    }

    public function ubah(Request $request, $id){
        $ubah_kategori=DB::table('kategori')
        ->where('id','like',$id)
        ->update(['nama_kategori' => $request->nama_kategori]);

        return redirect('/kategori')->with('toast_success', 'Data Kategori berhasil diubah');
    }

    public function hapus($id){

        $produk=DB::table('produk')
        ->where('kategori_id',$id)
        ->count();

        if ($produk == 0) {
            $kategori=Kategori::find($id);
            $kategori->delete();
            return back()->with('toast_success', 'Data Kategori berhasil dihapus');
        }
        toast('Data sedang digunakan,
                Hapus data gagal!','error');
        return back();
    }
}
