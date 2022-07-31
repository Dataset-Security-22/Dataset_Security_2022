<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pesanan extends Model
{
    use HasFactory;

    protected $table = "pesanan";

    protected $guarded = [''];

    public $timestamps = false;

    public function relasi_ke_menu()
    {
        return $this->belongsTo("App\Models\Menu", "id_menu", "id");
    }
}
