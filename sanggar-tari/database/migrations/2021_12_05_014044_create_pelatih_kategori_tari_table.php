<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePelatihKategoriTariTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pelatih_kategori_tari', function (Blueprint $table) {
            $table->id("id_pelatih_kategori");
            $table->integer("id_kategori");
            $table->integer("id_pelatih");
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('pelatih_kategori_tari');
    }
}
