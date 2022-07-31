<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Stock extends Model
{
    use HasFactory;

    protected $table = "stocks";

    protected $guarded = [''];

    public $timestamps = false;

    public function get_goods() {
        return $this->belongsTo("App\Models\Good", "good_id", "id");
    }
}
