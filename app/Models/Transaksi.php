<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Transaksi extends Model
{
    use HasFactory;

    protected $table = 'data_transaksi';

    protected $fillable = [
        'kode_transaksi',
        'nim',
        'nama',
        'kode_jurusan',
        'jurusan'
    ];
}
