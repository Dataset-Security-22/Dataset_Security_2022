<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pinjam extends Model
{
    use HasFactory;

    protected $table = "pinjam";

    protected $guarded = [''];

    public $timestamps = false;

    public function data_buku()
    {
        return $this->belongsTo("App\Model\Buku", "kode_buku", "kode");
    }

    public function data_anggota()
    {
        return $this->belongsTo("App\Model\Anggota", "id_anggota", "id");
    }
}
