<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pembayaran extends Model
{
    use HasFactory;

    protected $table = "pembayaran";

    protected $guarded = [''];

    public $timestamps = false;

    public function lpb_pelanggan()
    {
        return $this->belongsTo("App\Models\Pelanggan", "id_pelanggan", "id_pelanggan");
    }

    public function lpb_tagihan()
    {
        return $this->belongsTo("App\Models\Tagihan", "id_tagihan", "id");
    }
}
