<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Faker\Factory as Faker;

class MahasiswaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {

        $faker = Faker::create('id_ID');

        for ($i = 1; $i <= 200; $i++) {
            // insert data ke table pegawai menggunakan Faker
            \DB::table('table_mahasiswa')->insert([
                'nama' => $faker->name,
                'nim' => $faker->unique()->randomNumber(6),
                'jenis_kelamin' => $faker->boolean,
                'tempat_lahir' => $faker->city,
                'tanggal_lahir' => $faker->date,
                'alamat' => $faker->address,
                'jurusan_id' => $faker->numberBetween(1, 8)
            ]);
        }
    }
}
