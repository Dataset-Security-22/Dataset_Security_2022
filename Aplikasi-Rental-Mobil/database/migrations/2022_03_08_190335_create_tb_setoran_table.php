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
        Schema::create('tb_setoran', function (Blueprint $table) {
            $table->id("id_setoran");
            $table->integer("no_setoran")->nullable();
            $table->date("tgl_setoran");
            $table->integer("jumlah");
            $table->integer("id_sopir")->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('tb_setoran');
    }
};
