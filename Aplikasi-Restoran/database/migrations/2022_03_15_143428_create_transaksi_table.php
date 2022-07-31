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
        Schema::create('transaksi', function (Blueprint $table) {
            $table->id();
            $table->string("kode_transaksi")->nullable();
            $table->integer("id_order")->nullable();
            $table->double("bayar")->nullable();
            $table->double("total")->nullable();
            $table->string("status_transaksi")->nullable();
            $table->integer("id_meja")->nullable();
            $table->integer("id_user")->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('transaksi');
    }
};
