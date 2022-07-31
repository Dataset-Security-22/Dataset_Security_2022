<?php

namespace App\Models\Model;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Kelas extends Model
{
    use HasFactory;

    protected $table = "tb_kelas";

    protected $guarded = [''];

    public $timestamps = false;

    public function getProdi()
    {
    	return $this->hasOne("App\Models\Model\Prodi", "id_prodi", "id_prodi");
    }

    public function getAnggota()
    {
    	return $this->hasOne("App\Models\Model\Anggota", "id_kelas", "id_kelas");
    }
}
