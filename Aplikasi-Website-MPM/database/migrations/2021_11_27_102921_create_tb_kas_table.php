<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTbKasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tb_kas', function (Blueprint $table) {
            $table->id('id_kas');
            $table->integer('id_users');
            $table->string('nim_anggota', 100)->nullable();
            $table->double('bayar')->default(0);
            $table->date('tanggal');
            $table->text('keterangan')->nullable();
            $table->integer('status');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('tb_kas');
    }
}
