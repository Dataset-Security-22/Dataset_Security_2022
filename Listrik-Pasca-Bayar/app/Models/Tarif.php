<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tarif extends Model
{
    use HasFactory;

    protected $table = "tarif";

    protected $guarded = [''];

    public $timestamps = false;

    public function lpb_pelanggan()
    {
        return $this->hasMany("App\Models\Pelanggan", "id_tarif", "id");
    }
}
