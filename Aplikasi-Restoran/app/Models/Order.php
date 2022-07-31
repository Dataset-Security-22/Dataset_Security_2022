<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;

    protected $table = "order";

    protected $guarded = [''];

    public $timestamps = false;

    public function rs_meja()
    {
        return $this->belongsTo("App\Models\Meja", "id_meja", "id");
    }
}
