<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Jurusan extends Model
{
    use HasFactory;

    protected $table = 'table_jurusan';
    protected $fillable = ['kode_jurusan', 'jurusan'];

    public function mahasiswa()
    {
        return $this->hasMany(Mahasiswa::class);
    }
}
