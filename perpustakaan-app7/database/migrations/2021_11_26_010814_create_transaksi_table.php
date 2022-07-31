<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTransaksiTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('transaksi', function (Blueprint $table) {
            $table->bigIncrements("id_transaksi");
            $table->string("kode_transaksi", 100)->nullable();
            $table->string("kode_buku", 100)->nullable();
            $table->integer("id_anggota");
            $table->date("tanggal_pinjam");
            $table->date("tanggal_kembali");
            $table->date("tanggal_mengembalikan")->default(NULL);
            $table->double("denda")->default(NULL);
            $table->integer("id_petugas");
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('transaksi');
    }
}
