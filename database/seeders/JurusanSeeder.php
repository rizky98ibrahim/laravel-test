<?php

namespace Database\Seeders;

use App\Models\Jurusan;
use Illuminate\Database\Seeder;

class JurusanSeeder extends Seeder
{
    public function run()
    {
        $namaJurusan = ['Informatika', 'Sistem Informasi', 'Teknik Elektro', 'Teknik Mesin', 'Teknik Sipil', 'Teknik Industri', 'Akuntansi', 'Manajemen'];
        foreach ($namaJurusan as $jurusan) {
            Jurusan::create([
                'kode_jurusan' => 'JRS' . sprintf("%03d", rand(1, 999)),
                'jurusan' => $jurusan
            ]);
        }
    }
}
