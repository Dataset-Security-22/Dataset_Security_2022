<?php

namespace App\Models\Model;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Absensi extends Model
{
    use HasFactory;

    protected $table = "tb_absensi";

    protected $guarded = [''];

    public $timestamps = false;

    public function getAnggota()
    {
    	return $this->belongsTo("App\Models\Model\Anggota", "nim_anggota", "nim");
    }
}
