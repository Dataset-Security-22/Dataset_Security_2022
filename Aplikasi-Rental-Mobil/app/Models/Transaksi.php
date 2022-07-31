<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Transaksi extends Model
{
    use HasFactory;

    protected $table = "tb_transaksi";

    protected $guarded = [''];

    public $timestamps = false;

    public function re_kendaraan()
    {
        return $this->belongsTo("App\Models\Kendaraan", "id_kendaraan", "id");
    }

    public function re_sopir()
    {
        return $this->belongsTo("App\Models\Sopir", "id_sopir", "id_sopir");
    }
}
