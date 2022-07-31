<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTbAspirasiTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tb_aspirasi', function (Blueprint $table) {
            $table->id("id_aspirasi");
            $table->string("nim_anggota");
            $table->string("judul_aspirasi");
            $table->text("pesan");
            $table->date("tanggal_aspirasi");
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
        Schema::dropIfExists('tb_aspirasi');
    }
}
