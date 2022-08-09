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
        Schema::create('penggunaan', function (Blueprint $table) {
            $table->id('id_penggunaan');
            $table->string('id_pelanggan');
            $table->string('bulan');
            $table->year('tahun');
            $table->tinyInteger('meter_awal');
            $table->tinyInteger('meter_akhir');
            $table->date('tgl_cek');
            $table->string('id_petugas');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('penggunaan');
    }
};
