<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTbProfilTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tb_profil', function (Blueprint $table) {
            $table->id('id_profil');
            $table->string('visi', 150)->nullable();
            $table->string('misi', 150)->nullable();
            $table->text('tujuan');
            $table->text('fungsi');
            $table->integer('id_users')->default(0);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('tb_profil');
    }
}
