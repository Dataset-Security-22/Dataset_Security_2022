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
        Schema::create('tb_kendaraan', function (Blueprint $table) {
            $table->id();
            $table->string("no_plat", 50);
            $table->integer("tahun");
            $table->integer("tarif_perjam");
            $table->string("status_rental", 20);
            $table->string("kode_pemilik", 50)->nullable();
            $table->string("kode_type", 50)->nullable();
            $table->string("image")->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('tb_kendaraan');
    }
};
