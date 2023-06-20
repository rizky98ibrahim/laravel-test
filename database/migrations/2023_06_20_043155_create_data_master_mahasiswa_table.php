<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('data_master_mahasiswa', function (Blueprint $table) {
            $table->increments('id');
            $table->string('nama');
            $table->integer('nim')->unsigned();
            $table->boolean('jenis_kelamin')->default(true); // true untuk Laki-Laki, false untuk Perempuan
            $table->string('tempat_lahir');
            $table->date('tanggal_lahir');
            $table->string('alamat');
            $table->timestamps();
            $table->string('kode_jurusan')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('data_master_mahasiswa');
    }
};
