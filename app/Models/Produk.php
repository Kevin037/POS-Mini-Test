<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Produk extends Model
{
    protected $table = 'produk';
    protected $fillable = [
        'kode_produk',
        'nama_produk',
        'kategori_produk',
        'harga_beli',
        'harga_jual',
        'stok',
        'gambar_produk',
        'deskripsi_produk',
        'user_id'
    ];
}
