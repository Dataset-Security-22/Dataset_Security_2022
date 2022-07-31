<?php

namespace App\Models\Model;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Jurusan extends Model
{
    use HasFactory;

    protected $table = "tb_jurusan";

    protected $guarded = [''];

    public $timestamps = false;

    public function getProdi()
    {
    	return $this->hasOne("App\Models\Model\Prodi", "id_jurusan", "id_jurusan");
    }

}
