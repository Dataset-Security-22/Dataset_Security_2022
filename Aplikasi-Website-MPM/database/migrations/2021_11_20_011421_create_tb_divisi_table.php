<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTbDivisiTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tb_divisi', function (Blueprint $table) {
            $table->id('id_divisi');
            $table->integer('id_bagian')->default(0);
            $table->string('nim_anggota', 100)->nullable();
            $table->integer('id_jabatan')->default(0);
            $table->integer('id_angkatan')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('tb_divisi');
    }
}
