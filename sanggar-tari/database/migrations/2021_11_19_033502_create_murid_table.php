<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMuridTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('murid', function (Blueprint $table) {
            $table->id();
            $table->string("nama_murid", 100)->nullable();
            $table->integer("umur")->nullable();
            $table->enum("jenis_kelamin", ["L", "P"]);
            $table->string("no_hp", 50)->nullable();
            $table->text("alamat")->nullable();
            $table->string("foto")->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('murid');
    }
}
