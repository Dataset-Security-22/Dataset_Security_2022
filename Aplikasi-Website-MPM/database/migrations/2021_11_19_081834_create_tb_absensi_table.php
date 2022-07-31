<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTbAbsensiTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tb_absensi', function (Blueprint $table) {
            $table->id('id_absensi');
            $table->integer('id_users')->default(0);
            $table->date('tanggal_absen');
            $table->integer('status_absen');
            $table->text('keterangan');
            $table->string('nim_anggota', 100)->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('tb_absensi');
    }
}
