<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Asset extends Model
{
    use HasFactory;

    protected $table = "assets";

    protected $guarded = [''];

    public $timestamps = false;

    public function get_rooms() {
        return $this->belongsTo("App\Models\Room", "room_id", "id");
    }

    public function get_goods() {
        return $this->belongsTo("App\Models\Good", "good_id", "id");
    }
}
