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
        Schema::create('pembayaran', function (Blueprint $table) {
            $table->id();
            $table->string('id_pelanggan', 100);
            $table->integer('id_tagihan')->nullable();
            $table->string('tgl_bayar', 2);
            $table->time('waktu_bayar');
            $table->string('bulan_bayar', 2);
            $table->year('tahun_bayar');
            $table->double('jumlah_bayar');
            $table->double('biaya_admin');
            $table->double('total_akhir');
            $table->double('bayar');
            $table->double('kembali');
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
        Schema::dropIfExists('pembayaran');
    }
};
