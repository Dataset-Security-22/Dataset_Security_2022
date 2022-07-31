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
        Schema::create('tb_pemilik', function (Blueprint $table) {
            $table->id("id_pemilik");
            $table->string("kode_pemilik", 50)->nullable();
            $table->string("nama_pemilik");
            $table->string("alamat_pemilik");
            $table->integer("telp_pemilik");
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('tb_pemilik');
    }
};
