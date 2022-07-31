<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Sopir extends Model
{
    use HasFactory;

    protected $table = "tb_sopir";

    protected $guarded = [''];

    public $timestamps = false;

    public function re_transaksi()
    {
        return $this->hasOne("App\Models\Transaksi", "id_sopir", "id_sopir");
    }

    public function re_setoran()
    {
        return $this->hasMany("App\Models\Setoran", "id_sopir", "id_sopir");
    }
}
