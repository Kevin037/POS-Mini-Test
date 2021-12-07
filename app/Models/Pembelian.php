<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pembelian extends Model
{
    protected $table = 'pembelian';
    protected $fillable = [
        'tgl_pembelian',
        'produk_id',
        'jumlah_pembelian',
        'nominal_pembelian',
        'supplier_id',
        'user_id'
    ];
}
