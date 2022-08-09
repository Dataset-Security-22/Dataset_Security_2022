<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Penggunaan extends Model
{
    use HasFactory;

    protected $table = "penggunaan";

    protected $guarded = [''];

    public $timestamps = false;

    public function lpb_pelanggan()
    {
        return $this->belongsTo("App\Models\Pelanggan", "id_pelanggan", "id_pelanggan");
    }

    public function lpb_tagihan()
    {
        return $this->hasOne("App\Models\Tagihan", "id_penggunaan", "id_penggunaan");
    }

    public function lpb_user()
    {
        return $this->belongsTo("App\User", "id_petugas", "id");
    }
}
