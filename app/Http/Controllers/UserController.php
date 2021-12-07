<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Kategori;
use App\Models\Supplier;
use App\Models\Pelanggan;
use App\Models\Pembelian;
use App\Models\Penjualan;
use App\Models\User;
use Illuminate\Support\Facades\DB;

class UserController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function home ()
    {
        $user=DB::table('users')
        // ->orderBy('created_at', 'DESC')
        ->select('users.*')
        ->get();

        return view('admin.user',compact('user'));
    }

    public function tambah(Request $request){
        $user = new pelanggan;
        $user->name = $request->nama_user;
        $user->email = $request->email;
        $user->role = 'user';
        $user->password = $request->password;
        $pelanggan->save(); 

        // toast('pelanggan berhasil ditambahkan','success');
        return redirect('/user')->with('toast_success', 'User berhasil ditambahkan');
    }    

    public function form_edit ($id)
    {
        $user_id=
        DB::table('users')
        ->where('id',$id)
        ->select('users.*')
        ->get();

        return view('admin.form-edit-user',compact('user_id'));
    }

    public function ubah(Request $request, $id){
        $ubah_user=DB::table('users')
        ->where('id','like',$id)
        ->update([
            'name' => $request->nama_user,
            'email' => $request->email,
    ]);

        return redirect('/user')->with('toast_success', 'Data User berhasil diubah');
    }

    public function hapus($id){

        $user=User::find($id);
            $user->delete();
            return back()->with('toast_success', 'Data User berhasil dihapus');
        
    }
}
