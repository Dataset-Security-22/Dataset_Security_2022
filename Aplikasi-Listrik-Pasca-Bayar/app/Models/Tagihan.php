<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tagihan extends Model
{
    use HasFactory;

    protected $table = "tagihan";

    protected $guarded = [''];

    public $timestamps = false;

    public function lpb_pelanggan()
    {
        return $this->belongsTo("App\Models\Pelanggan", "id_pelanggan", "id_pelanggan");
    }

    public function lpb_penggunaan()
    {
        return $this->belongsTo("App\Models\Penggunaan", "id_penggunaan", "id_penggunaan");
    }
}
