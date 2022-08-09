<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pelanggan extends Model
{
    use HasFactory;

    protected $table  = "pelanggan";

    protected $guarded = [''];

    public $timestamps = false;

    public function lpb_tarif()
    {
        return $this->belongsTo("App\Models\Tarif", "id_tarif", "id");
    }

    public function lpb_penggunaan()
    {
        return $this->hasOne("App\Models\Penggunaan", "id_pelanggan", "id_pelanggan");
    }
}
