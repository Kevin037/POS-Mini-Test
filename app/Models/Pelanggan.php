<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pelanggan extends Model
{
    protected $table = 'pelanggan';
    protected $fillable = [
        'kode_pelanggan',
        'nama_pelanggan',
        'no_hp_pelanggan',
        'alamat_pelanggan',
        'user_id'
    ];
}
