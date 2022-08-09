<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Kategori extends Model
{
    use HasFactory;

    protected $table = "kategori";

    protected $guarded = [''];

    public $timestamps = false;

    public function buku()
    {
        return $this->hasMany("App\Model\Buku", "id_kategori", "id");
    }
}
