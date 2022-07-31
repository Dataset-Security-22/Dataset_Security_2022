<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DetailOrder extends Model
{
    use HasFactory;

    protected $table = "detail_order";

    protected $guarded = [''];

    public $timestamps = false;

    public function rs_masakan()
    {
        return $this->belongsTo("App\Models\Masakan", "id_masakan", "id");
    }
}
