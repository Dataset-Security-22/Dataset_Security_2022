<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Anggota extends Model
{
    use HasFactory;

    protected $table = "anggota";

    protected $guarded = [''];

    public $timestamps = false;

    public function pinjam()
    {
        return $this->hasMany("App\Model\Pinjam", "id_anggota", "id");
    }

    public function prodi()
    {
        return $this->belongsTo("App\Model\Prodi", "id_prodi", "id");
    }
}
