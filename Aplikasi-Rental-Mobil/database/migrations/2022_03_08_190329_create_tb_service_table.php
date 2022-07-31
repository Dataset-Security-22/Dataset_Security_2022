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
        Schema::create('tb_service', function (Blueprint $table) {
            $table->id("id_service");
            $table->string("kode_service", 50);
            $table->date("tgl_service");
            $table->integer("biaya_service");
            $table->integer("id_jenis_service");
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('tb_service');
    }
};
