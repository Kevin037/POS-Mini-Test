<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Invoice extends Model
{
    protected $table = 'invoice';
    protected $fillable = [
        'tgl_transaksi',
        'kode_invoice',
        'total_nominal',
        'uang diterima',
        'uang kembali',
        'net_profit',
        'pelanggan_id',
        'user_id'
    ];
}
