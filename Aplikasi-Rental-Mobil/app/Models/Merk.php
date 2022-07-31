<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Merk extends Model
{
    use HasFactory;

    protected $table = "tb_merk";

    protected $guarded = [''];

    public $timestamps = false;

    public function re_type()
    {
        return $this->hasMany("App\Models\Type", "kode_merk", "kode_merk");
    }

    public function re_kendaraan()
    {
        return $this->hasMany("App\Models\Kendaraan", "kode_merk", "kode_merk");
    }
}
