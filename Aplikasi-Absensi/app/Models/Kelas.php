<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Kelas extends Model
{
    use HasFactory;

    protected $table = "kelas";

    protected $guarded = [''];

    public $timestamps = false;

    public function guru()
    {
        return $this->belongsTo("App\Models\Guru", "nip_wali_kelas", "nip");
    }

    public function siswa()
    {
        return $this->hasMany("App\Models\Siswa", "id_kelas", "id");
    }
}
