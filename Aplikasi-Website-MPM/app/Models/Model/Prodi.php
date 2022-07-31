<?php

namespace App\Models\Model;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Prodi extends Model
{
    use HasFactory;

    protected $table = "tb_prodi";

    protected $guarded = [''];

    public $timestamps = false;

    public function getJurusan()
    {
    	return $this->hasOne("App\Models\Model\Jurusan", "id_jurusan", "id_jurusan");
    }

    public function setKelas()
    {
    	return $this->hasOne("App\Models\Model\Kelas", "id_prodi", "id_prodi");
    }
}
