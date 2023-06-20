<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Mahasiswa extends Model
{
    use HasFactory;

    protected $table = 'table_mahasiswa';

    protected $fillable = [
        'nama',
        'nim',
        'jenis_kelamin',
        'tempat_lahir',
        'tanggal_lahir',
        'alamat',
        'jurusan_id'
    ];

    public function jurusan()
    {
        return $this->belongsTo(Jurusan::class);
    }
}
