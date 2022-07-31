<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pelanggan extends Model
{
    use HasFactory;

    protected $table = "tb_pelanggan";

    protected $guarded = [''];

    public $timestamps = false;

    public function re_transaksi()
    {
        return $this->belongsTo("App\Models\Transaksi", "id_transaksi", "id");
    }
}
