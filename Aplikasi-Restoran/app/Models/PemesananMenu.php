<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PemesananMenu extends Model
{
    use HasFactory;

    protected $table = "pemesanan_menu";

    protected $guarded = [''];

    public $timestamps = false;

    public function relasi_ke_meja()
    {
        return $this->belongsTo("App\Models\Meja", "id_meja", "id");
    }

    public function relasi_ke_transaksi()
    {
        return $this->hasMany("App\Models\Transaksi", "id_pemesanan_menu", "id");
    }
}
