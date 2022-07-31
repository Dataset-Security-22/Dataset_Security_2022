<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Attribute extends Model
{
    use HasFactory;

    protected $table = "attributes";

    protected $guarded = [''];

    public $timestamps = false;

    public function get_goods() {
        return $this->belongsTo("App\Models\Good", "good_id", "id");
    }
}
