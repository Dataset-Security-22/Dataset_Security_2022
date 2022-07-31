<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTbPostTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tb_post', function (Blueprint $table) {
            $table->id();
            $table->integer("id_kategori");
            $table->string("title", 100)->nullable();
            $table->string("slug")->nullable();
            $table->text("body")->nullable();
            $table->datetime("tanggal_upload");
            $table->datetime("tanggal_ubah_upload");
            $table->string("gambar")->nullable(); 
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('tb_post');
    }
}
