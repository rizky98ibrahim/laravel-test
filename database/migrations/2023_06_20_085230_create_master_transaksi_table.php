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
        Schema::create('table_transaksi', function (Blueprint $table) {
            $table->increments('id');
            $table->string('kode_transaksi')->unique();
            $table->unsignedBigInteger('nim');
            $table->string('nama');
            $table->string('kode_jurusan');
            $table->string('jurusan');
            $table->foreign('nim')->references('nim')->on('table_mahasiswa');
            $table->foreign('kode_jurusan')->references('kode_jurusan')->on('table_jurusan');
            $table->timestamps();
        });
    }
    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('table_transaksi');
    }
};
