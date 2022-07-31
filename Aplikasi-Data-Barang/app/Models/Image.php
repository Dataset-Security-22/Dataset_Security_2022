<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Image extends Model
{
    use HasFactory;

    protected $table = "images";

    protected $guarded = [''];

    public $timestamps = false;

    public function get_rooms() {
        return $this->belongsTo("App\Models\Room", "room_id", "id");
    }

    public function get_fields() {
        return $this->belongsTo("App\Models\Field", "field_id", "id");
    }
}
