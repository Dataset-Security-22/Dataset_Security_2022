<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Kendaraan extends Model
{
    use HasFactory;

    protected $table = "tb_kendaraan";

    protected $guarded = [''];

    public $timestamps = false;

    public function re_pemilik()
    {
        return $this->belongsTo("App\Models\Pemilik", "kode_pemilik", "kode_pemilik");
    }

    public function re_type()
    {
        return $this->belongsTo("App\Models\Type", "kode_type", "kode_type");
    }

    public function re_transaksi()
    {
        return $this->hasMany("App\Models\Transaksi", "id_kendaraan", "id");
    }
}
