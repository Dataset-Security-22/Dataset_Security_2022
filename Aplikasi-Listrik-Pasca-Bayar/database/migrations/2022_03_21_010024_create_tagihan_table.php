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
        Schema::create('tagihan', function (Blueprint $table) {
            $table->id();
            $table->string('id_pelanggan', 100);
            $table->integer('id_penggunaan')->nullable();
            $table->string('bulan', 2);
            $table->year('tahun');
            $table->integer('jumlah_meter');
            $table->double('tarif_perkwh');
            $table->double('jumlah_bayar');
            $table->string('status', 15);
            $table->string('id_petugas', 12);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('tagihan');
    }
};
