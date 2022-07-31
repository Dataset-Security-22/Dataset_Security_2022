<?php

namespace App\Models;
use App\Models\KategoriModel;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class BukuModel extends Model
{
    protected $table = "buku";

    // protected $table = "buku";

    protected $guarded = [''];

    public $timestamps = false;

    public function getKategori()
    {
        // SELECT * FROM buku JOIN kategori ON buku.id_kategori = kategori.id_kategori

        // return $this->belongsTo(ModelYangInginDiJoin, AtributJoinChild , AtributJoinParent)
        return $this->hasOne("App\Models\KategoriModel", "id_kategori", "id_kategori");
    }
}
