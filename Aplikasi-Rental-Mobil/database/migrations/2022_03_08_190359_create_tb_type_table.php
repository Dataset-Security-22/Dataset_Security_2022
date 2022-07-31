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
        Schema::create('tb_type', function (Blueprint $table) {
            $table->id("id_type");
            $table->string("kode_type", 50)->nullable();
            $table->string("nama_type", 20);
            $table->integer("kode_merk")->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('tb_type');
    }
};
