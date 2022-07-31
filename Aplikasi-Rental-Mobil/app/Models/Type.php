<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Type extends Model
{
    use HasFactory;

    protected $table = "tb_type";

    protected $guarded = [''];

    public $timestamps = false;

    public function re_merk()
    {
        return $this->belongsTo("App\Models\Merk", "kode_merk", "kode_merk");
    }

    public function re_kendaraan()
    {
        return $this->hasMany("App\Models\Kendaraan", "kode_type", "kode_type");
    }
}
