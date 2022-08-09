<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Buku extends Model
{
    use HasFactory;

    protected $table = "buku";

    protected $guarded = [''];

    public $timestamps = false;

    public function data_rak()
    {
        return $this->belongsTo("App\Model\Rak", "id_rak", "id");
    }

    public function data_kategori()
    {
        return $this->belongsTo("App\Model\Kategori", "id_kategori", "id");
    }

    public function pinjam()
    {
        return $this->hasMany("App\Model\Pinjam", "kode_buku", "kode");
    }
}
