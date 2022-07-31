<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTbProkerTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tb_proker', function (Blueprint $table) {
            $table->id('id_proker');
            $table->string('nama_proker', 100)->nullable();
            $table->string('waktu', 100)->nullable();
            $table->string('target', 100)->nullable();
            $table->string('parameter', 100)->nullable();
            $table->string('metode', 100)->nullable();
            $table->string('sasaran', 100)->nullable();
            $table->string('kebutuhan', 100)->nullable();
            $table->integer('id_users')->default(0);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('tb_proker');
    }
}
