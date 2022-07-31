<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Setoran extends Model
{
    use HasFactory;

    public $table = "tb_setoran";

    protected $guarded = [''];

    public $timestamps = false;

    public function re_sopir()
    {
        return $this->belongsTo("App\Models\Sopir", "id_sopir", "id_sopir");
    }
}
