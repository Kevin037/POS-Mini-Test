<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Kategori;
use App\Models\Supplier;
use App\Models\Pelanggan;
use App\Models\Pembelian;
use App\Models\Penjualan;
use Illuminate\Support\Facades\DB;

class SupplierController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function home ()
    {
        $supplier=
        DB::table('supplier')
        // ->orderBy('created_at', 'DESC')
        ->select('supplier.*')
        ->get();

        return view('admin.supplier',compact('supplier'));
    }

    public function tambah(Request $request){
        $id_max=Supplier::max('id');
        $id_new=$id_max+1;
        $kode='#SP'.$id_new;

        $supplier = new supplier;
        $supplier->kode_supplier = $kode;
        $supplier->nama_supplier = $request->nama_supplier;
        $supplier->no_hp_supplier = $request->no_hp_supplier;
        $supplier->alamat_supplier = $request->alamat_supplier;
        $supplier->user_id = auth()->user()->id;
        $supplier->save(); 

        // toast('supplier berhasil ditambahkan','success');
        return redirect('/supplier')->with('toast_success', 'Supplier berhasil ditambahkan');
    }    

    public function form_edit ($id)
    {
        $supplier_id=
        DB::table('supplier')
        ->where('id',$id)
        ->select('supplier.*')
        ->get();

        return view('admin.form-edit-supplier',compact('supplier_id'));
    }

    public function ubah(Request $request, $id){
        $ubah_supplier=DB::table('supplier')
        ->where('id','like',$id)
        ->update([
            'nama_supplier' => $request->nama_supplier,
            'no_hp_supplier' => $request->no_hp_supplier,
            'alamat_supplier'=> $request->alamat_supplier
    ]);

        return redirect('/supplier')->with('toast_success', 'Data Supplier berhasil diubah');
    }

    public function hapus($id){

        $pembelian=DB::table('pembelian')
        ->where('supplier_id',$id)
        ->count();

        if ($pembelian == 0) {
            toast('Data sedang digunakan,
                Hapus data gagal!','error');
          return back();
          
        }
        $supplier=Supplier::find($id);
            $supplier->delete();
            return back()->with('toast_success', 'Data Supplier berhasil dihapus');
        
    }
}
