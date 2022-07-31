<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTbBeritaTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tb_berita', function (Blueprint $table) {
            $table->id();
            $table->string('judul', 100)->nullable();
            $table->integer('id_users')->default(0);
            $table->string('gambar', 255)->nullable();
            $table->enum("status", [0, 1])->default(0);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('tb_berita');
    }
}
