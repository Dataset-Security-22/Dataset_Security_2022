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
        Schema::create('tb_sopir', function (Blueprint $table) {
            $table->id("id_sopir");
            $table->string("nama_sopir");
            $table->string("alamat_sopir");
            $table->string("telp_sopir", 15);
            $table->integer("no_sim");
            $table->integer("tarif_perjam");
            $table->integer("aktif")->default(0);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('tb_sopir');
    }
};
