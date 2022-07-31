<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Transaksi extends Model
{
    use HasFactory;

    protected $table = "transaksi";

    protected $guarded = [''];

    public $timestamps = false;

    public function relasi_ke_meja()
    {
        return $this->belongsTo("App\Models\Meja", "id_meja", "id");
    }

    public function relasi_ke_pemesanan_menu()
    {
        return $this->belongsTo("App\Models\PemesananMenu", "id_pemesanan_menu", "id");
    }
}
