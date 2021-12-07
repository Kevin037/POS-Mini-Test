<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Supplier extends Model
{
    protected $table = 'supplier';
    protected $fillable = [
        'kode_produk',
        'nama_supplier',
        'no_hp_supplier',
        'alamat_supplier',
        'user_id'
    ];
}
