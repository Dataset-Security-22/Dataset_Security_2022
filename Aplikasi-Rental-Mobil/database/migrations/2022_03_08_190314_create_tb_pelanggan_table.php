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
        Schema::create('tb_pelanggan', function (Blueprint $table) {
            $table->id();
            $table->string("no_ktp");
            $table->string("nama_pel");
            $table->string("alamat_pel");
            $table->string("telp_pel");
            $table->integer("id_transaksi")->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('tb_pelanggan');
    }
};
