<?php

namespace App\Models\Model;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Divisi extends Model
{
    use HasFactory;

    protected $table = "tb_divisi";

    protected $guarded = [''];

    public $timestamps = false;

    public function getAnggota()
    {
    	return $this->hasOne("App\Models\Model\Anggota", "nim", "nim_anggota");
    }

    public function getBagian()
    {
    	return $this->hasOne("App\Models\Model\Bagian", "id_bagian", "id_bagian");
    }

    public function getJabatan()
    {
    	return $this->hasOne("App\Models\Model\Jabatan", "id_jabatan", "id_jabatan");
    }
}
