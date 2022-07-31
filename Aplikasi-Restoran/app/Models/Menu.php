<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Menu extends Model
{
    use HasFactory;

    protected $table = "menu";

    protected $guarded = [''];

    public $timestamps = false;

    public function relasi_ke_pesanan()
    {
        return $this->hasMany("App\Models\Pesanan", "id_menu", "id");
    }
}
