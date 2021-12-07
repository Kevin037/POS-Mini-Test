<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Penjualan extends Model
{
    protected $table = 'penjualan';
    protected $fillable = [
        'tgl_penjualan',
        'kode_penjualan',
        'produk_id',
        'jumlah_penjualan',
        'nominal_penjualan',
        'uang_diterima',
        'uang_kembali',
        'net_profit',
        'pelanggan_id',
        'user_id'
    ];
}
