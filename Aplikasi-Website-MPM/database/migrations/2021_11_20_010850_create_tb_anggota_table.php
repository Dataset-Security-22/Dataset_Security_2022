<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTbAnggotaTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tb_anggota', function (Blueprint $table) {
            $table->id('id');
            $table->string('nim', 50)->unique();
            $table->string('nama', 100)->nullable();
            $table->enum('jenis_kelamin', ['L', 'P']);
            $table->string('agama', 50)->nullable();
            $table->string('no_hp', 30)->nullable();
            $table->text('alamat');
            $table->integer('id_kelas')->default(0); 
            $table->string('gambar')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('tb_anggota');
    }
}
