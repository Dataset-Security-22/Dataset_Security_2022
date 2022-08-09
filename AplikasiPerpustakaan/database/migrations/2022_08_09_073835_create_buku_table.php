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
        Schema::create('buku', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer('id_user')->nullable();
            $table->integer('id_rak')->nullable();
            $table->integer('id_kategori')->nullable();
            $table->string('img')->nullable();
            $table->string('judul')->nullable();
            $table->string('penerbit')->nullable();
            $table->string('pengarang')->nullable();
            $table->integer('tahun');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('buku');
    }
};
