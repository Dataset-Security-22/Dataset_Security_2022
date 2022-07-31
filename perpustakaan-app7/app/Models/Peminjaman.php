<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Peminjaman extends Model
{
    use HasFactory;

    protected $table = "peminjaman";

    protected $guarded = [''];

    public $timestamps = false;


    public function getBuku()
    {
        // SELECT * FROM buku JOIN kategori ON buku.id_kategori = kategori.id_kategori

        // return $this->belongsTo(ModelYangInginDiJoin, AtributJoinChild , AtributJoinParent)
        return $this->belongsTo("App\Models\BukuModel", "kode_buku", "kode_buku");
    }

    public function getAnggota()
    {
        // SELECT * FROM buku JOIN kategori ON buku.id_kategori = kategori.id_kategori

        // return $this->belongsTo(ModelYangInginDiJoin, AtributJoinChild , AtributJoinParent)
        return $this->belongsTo("App\Models\AnggotaModel", "id_anggota", "id_anggota");
    }

    public function getUser()
    {
        // SELECT * FROM buku JOIN kategori ON buku.id_kategori = kategori.id_kategori

        // return $this->belongsTo(ModelYangInginDiJoin, AtributJoinChild , AtributJoinParent)
        return $this->belongsTo("App\Models\User", "id_admin", "id");
    }
}


