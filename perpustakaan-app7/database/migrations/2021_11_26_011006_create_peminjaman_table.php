<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePeminjamanTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('peminjaman', function (Blueprint $table) {
            $table->string('kode_peminjaman', 100)->primaryKey();
            $table->string('kode_buku', 100)->nullable();
            $table->integer('id_anggota');
            $table->date('tanggal_pinjam');
            $table->date('tanggal_kembali');
            $table->integer('id_petugas');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('peminjaman');
    }
}
