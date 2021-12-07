<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Kategori;
use App\Models\Supplier;
use App\Models\Pelanggan;
use App\Models\Pembelian;
use App\Models\Penjualan;
use Illuminate\Support\Facades\DB;

class PelangganController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function home ()
    {
        $pelanggan=
        DB::table('pelanggan')
        // ->orderBy('created_at', 'DESC')
        ->select('pelanggan.*')
        ->get();

        return view('admin.pelanggan',compact('pelanggan'));
    }

    public function tambah(Request $request){
        $id_max=Pelanggan::max('id');
        $id_new=$id_max+1;
        $kode='#KN'.$id_new;

        $pelanggan = new pelanggan;
        $pelanggan->kode_pelanggan = $kode;
        $pelanggan->nama_pelanggan = $request->nama_pelanggan;
        $pelanggan->no_hp_pelanggan = $request->no_hp_pelanggan;
        $pelanggan->alamat_pelanggan = $request->alamat_pelanggan;
        $pelanggan->user_id = auth()->user()->id;
        $pelanggan->save(); 

        // toast('pelanggan berhasil ditambahkan','success');
        return redirect('/pelanggan')->with('toast_success', 'Pelanggan berhasil ditambahkan');
    }    

    public function form_edit ($id)
    {
        $pelanggan_id=
        DB::table('pelanggan')
        ->where('id',$id)
        ->select('pelanggan.*')
        ->get();

        return view('admin.form-edit-pelanggan',compact('pelanggan_id'));
    }

    public function ubah(Request $request, $id){
        $ubah_pelanggan=DB::table('pelanggan')
        ->where('id','like',$id)
        ->update([
            'nama_pelanggan' => $request->nama_pelanggan,
            'no_hp_pelanggan' => $request->no_hp_pelanggan,
            'alamat_pelanggan'=> $request->alamat_pelanggan
    ]);

        return redirect('/pelanggan')->with('toast_success', 'Data Pelanggan berhasil diubah');
    }

    public function hapus($id){

        $penjualan=DB::table('penjualan')
        ->where('pelanggan_id',$id)
        ->count();
  
        if ($penjualan == 0) {
            toast('Data sedang digunakan,
                Hapus data gagal!','error');
          return back();
          
        }
        $pelanggan=Pelanggan::find($id);
            $pelanggan->delete();
            return back()->with('toast_success', 'Data Pelanggan berhasil dihapus');
        
    }
}
