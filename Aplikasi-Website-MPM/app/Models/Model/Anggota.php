<?php

namespace App\Models\Model;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Anggota extends Model
{
    use HasFactory;

    protected $table = "tb_anggota";

    protected $guarded = [''];

    public $timestamps = false;

    public function getKelas()
    {
    	return $this->hasOne("App\Models\Model\Kelas", "id_kelas", "id_kelas");
    }
}
