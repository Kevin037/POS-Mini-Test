<?php
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\KategoriController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ProdukController;
use App\Http\Controllers\SupplierController;
use App\Http\Controllers\PelangganController;
use App\Http\Controllers\PembelianController;
use App\Http\Controllers\PenjualanController;
use App\Http\Controllers\GambarController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
Route::group(['middleware' => 'admin' ],function(){
Route::get('/home-admin',[DashboardController::class,'home'])->name('home-admin');
Route::get('/',[DashboardController::class,'home']);

Route::get('/kategori',[KategoriController::class,'home']);
Route::post('/tambahkategori',[KategoriController::class,'tambah']);
Route::get('/form-edit-kategori{id}',[KategoriController::class,'form_edit']);
Route::post('/ubahkategori{id}',[KategoriController::class,'ubah']);
Route::get('/hapuskategori{id}',[KategoriController::class,'hapus']);
Route::get('/test',[KategoriController::class,'test']);

Route::get('/produk',[ProdukController::class,'home']);
Route::post('/tambahproduk',[ProdukController::class,'tambah']);
Route::get('/form-edit-produk{id}',[ProdukController::class,'form_edit']);
Route::post('/ubahproduk{id}',[ProdukController::class,'ubah']);
Route::get('/hapusproduk{id}',[ProdukController::class,'hapus']);

Route::get('/supplier',[SupplierController::class,'home']);
Route::post('/tambahsupplier',[SupplierController::class,'tambah']);
Route::get('/form-edit-supplier{id}',[SupplierController::class,'form_edit']);
Route::post('/ubahsupplier{id}',[SupplierController::class,'ubah']);
Route::get('/hapussupplier{id}',[SupplierController::class,'hapus']);

Route::get('/pelanggan',[PelangganController::class,'home']);
Route::post('/tambahkpelanggan',[PelangganController::class,'tambah']);
Route::get('/form-edit-pelanggan{id}',[PelangganController::class,'form_edit']);
Route::post('/ubahpelanggan{id}',[PelangganController::class,'ubah']);
Route::get('/hapuspelanggan{id}',[PelangganController::class,'hapus']);

Route::get('/user',[UserController::class,'home']);
Route::post('/tambahuser',[UserController::class,'tambah']);
Route::get('/form-edit-user{id}',[UserController::class,'form_edit']);
Route::post('/ubahuser{id}',[UserController::class,'ubah']);
Route::get('/hapususer{id}',[UserController::class,'hapus']);

Route::get('/pembelian',[PembelianController::class,'home']);
Route::post('/tambahpembelian',[PembelianController::class,'tambah']);
Route::get('/kategoripilih{id}',[PembelianController::class,'pilih']);
Route::get('/tampilsupplier{id}',[PembelianController::class,'supplier']);
Route::get('/tampilharga{id}',[PembelianController::class,'harga']);

Route::get('/laporan_pembelian',[PembelianController::class,'laporan']);
Route::get('/laporan_pembelian_perproduk',[ProdukController::class,'laporan_pembelian']);
Route::get('/detail_pembelian_perproduk{id}',[ProdukController::class,'detail_pembelian']);
Route::get('/laporan_penjualan',[PenjualanController::class,'laporan']);
Route::get('/laporan_penjualan_perproduk',[ProdukController::class,'laporan_penjualan']);
Route::get('/detail_penjualan_perproduk{id}',[ProdukController::class,'detail_penjualan']);

Route::get('/penjualan',[PenjualanController::class,'home']);
// Route::post('/tambahpenjualan',[PenjualanController::class,'tambah']);
Route::get('/tampilstok{id}',[PenjualanController::class,'tampilstok']);
});

Route::group(['middleware' => 'user' ],function(){
Route::get('/home-user',[HomeController::class,'index'])->name('home-user');
Route::get('/filterproduk',[HomeController::class,'filter']);
Route::get('/form-pemesanan{id}',[PenjualanController::class,'form']);
Route::get('/tampilalamat{id}',[PenjualanController::class,'alamat_pelanggan']);
Route::post('/tambahpenjualan',[PenjualanController::class,'tambah'])->name('simpan');
Route::get('/laporan_penjualan',[HomeController::class,'laporan']);
Route::get('/laporan_penjualan_perproduk',[HomeController::class,'laporan_penjualan']);
Route::get('/detail_penjualan_perproduk{id}',[HomeController::class,'detail_penjualan']);
});

// Route::get('/invoice-pesanan',[PenjualanController::class,'invoice']);
// Route::get('/kasir',[PenjualanController::class,'kasir']);
// Route::post('/tambahinvoice',[PenjualanController::class,'tambahinvoice']);
// Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Auth::routes();