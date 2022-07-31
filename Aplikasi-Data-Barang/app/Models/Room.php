<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Room extends Model
{
    use HasFactory;

    protected $table = "rooms";

    protected $guarded = [''];

    public $timestamps = false;

    public function get_lands() {
        return $this->belongsTo("App\Models\Land", "land_id", "id");
    }
}
