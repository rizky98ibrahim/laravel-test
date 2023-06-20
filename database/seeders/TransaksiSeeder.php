<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Transaksi;
use App\Models\Mahasiswa;
use App\Models\Jurusan;
use Faker\Factory as Faker;

class TransaksiSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $faker = Faker::create();

        $mahasiswa = Mahasiswa::all();
        $jurusan = Jurusan::all();

        foreach ($mahasiswa as $mhs) {
            Transaksi::create([
                'kode_transaksi' => 'TRS' . $faker->unique()->randomNumber(3),
                'nim' => $mhs->nim,
                'nama' => $mhs->nama,
                'kode_jurusan' => $jurusan->random()->kode_jurusan,
                'jurusan' => $jurusan->random()->jurusan
            ]);
        }
    }
}
