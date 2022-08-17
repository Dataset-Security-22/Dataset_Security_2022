<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class customer extends Model
{
    use HasFactory;
    protected $table = "customers";

    protected $guarded = [''];

    public $timestamps = false;

    public function getUser()
    {
        // SELECT * FROM buku JOIN kategori ON buku.id_kategori = kategori.id_kategori

        // return $this->belongsTo(ModelYangInginDiJoin, AtributJoinChild , AtributJoinParent)
        return $this->hasOne("App\Models\user", "id", "user_id");
    }
}
