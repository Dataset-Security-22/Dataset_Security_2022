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
        Schema::create('tb_karyawan', function (Blueprint $table) {
            $table->integer("nik")->primary();
            $table->string("nama_kar", 50);
            $table->string("telp_kar", 20);
            $table->string("jenis_kelamin", 50)->nullable();
            $table->longText("alamat_kar");
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('tb_karyawan');
    }
};
