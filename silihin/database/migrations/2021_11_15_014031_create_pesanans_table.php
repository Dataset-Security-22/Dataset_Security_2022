<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePesanansTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pesanans', function (Blueprint $table) {
            $table->id();
            $table->integer('id_peminjam');
            $table->integer('id_penyewa');
            $table->integer('id_kendaraan');
            $table->string('invoice');
            $table->string('dari');
            $table->string('tujuan');
            $table->integer('hari');
            $table->integer('persetujuan')->nullable();
            $table->integer('selesai')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('pesanans');
    }
}
