<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Prodi extends Model
{
    use HasFactory;

    protected $table = "prodi";

    protected $guarded = [''];

    public $timestamps = false;

    public function anggota()
    {
        return $this->hasMany("App\Model\Anggota", "id_prodi", "id");
    }
}
