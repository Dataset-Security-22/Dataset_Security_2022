<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Meja extends Model
{
    use HasFactory;

    protected $table = "meja";

    protected $guarded = [''];

    public $timestamps = false;

    public function relasi_ke_pemesanan_menu()
    {
        return $this->belongsTo("App\Models\PemesananMenu", "id_meja", "id");
    }

    public function relasi_ke_transaksi()
    {
        return $this->hasMany("App\Models\Transaksi", "id_meja", "id");
    }
}
