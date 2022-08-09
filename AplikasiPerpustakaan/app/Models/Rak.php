<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Rak extends Model
{
    use HasFactory;

    protected $table = "rak";

    protected $guarded = [''];

    public $timestamps = false;

    public function buku()
    {
        return $this->hasMany("App\Model\Buku", "id_rak", "id");
    }
}
