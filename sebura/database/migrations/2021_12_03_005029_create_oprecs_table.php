<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOprecsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('oprecs', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer('nim');
            $table->string('nama');
            $table->string('tempat');
            $table->date('ttl');
            $table->string('no_telp');
            $table->string('email');
            $table->string('jurusan');
            $table->string('alasan')->nullable();
            $table->string('gambar');
            $table->integer('diterima')->nullable();
            $table->integer('ditolak')->nullable();
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
        Schema::dropIfExists('oprecs');
    }
}
