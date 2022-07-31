<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePanitiaAcarasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('panitia_acaras', function (Blueprint $table) {
            $table->id();
            $table->foreignId('id_acara');
            $table->foreignId('id_pengurus');
            $table->foreignId('id_ketpanitia');
            $table->integer('final')->nullable();
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
        Schema::dropIfExists('panitia_acaras');
    }
}
