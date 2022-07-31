<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTbHubungiKamiTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tb_hubungi_kami', function (Blueprint $table) {
            $table->id("id_hubungi");
            $table->string("nama", 100);
            $table->string("email", 100);
            $table->string("judul", 100);
            $table->text("pesan");
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('tb_hubungi_kami');
    }
}
