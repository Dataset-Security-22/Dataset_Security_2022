<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tb_transaksi', function (Blueprint $table) {
            $table->id();
            $table->integer("no_transaksi")->nullable();
            $table->date("tgl_pesan")->nullable();
            $table->date("tgl_pinjam")->nullable();
            $table->time("jam_pinjam")->nullable();
            $table->date("tgl_kembali_rencana")->nullable();
            $table->date("tgl_kembali_realisasi")->nullable();
            $table->double("denda")->nullable();
            $table->double("kilometer_perjam")->nullable();
            $table->double("kilometer_kembali")->nullable();
            $table->double("bbm_pinjam")->nullable();
            $table->double("bbm_kembali")->nullable();
            $table->string("kondisi_mobil_pinjam", 50)->nullable();
            $table->string("kondisi_mobil_kembali", 50)->nullable();
            $table->string("kerusakan")->nullable();
            $table->double("biaya_kerusakan")->nullable();
            $table->double("bayar_denda_pengembalian")->nullable();
            $table->double("bayar_rental")->nullable();
            $table->integer("id_sopir")->nullable();
            $table->integer("id_kendaraan")->nullable();
            $table->integer("id_petugas")->nullable();
            $table->string("status_pengembalian", 100)->default("Belum");
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('tb_transaksi');
    }
};
