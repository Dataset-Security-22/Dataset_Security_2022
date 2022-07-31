<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pemilik extends Model
{
    use HasFactory;

    protected $table = "tb_pemilik";

    protected $guarded = [''];

    public $timestamps = false;

    public function re_kendaraan()
    {
        return $this->hasMany("App\Models\Kendaraan", "kode_pemilik", "kode_pemilik");
    }
}
