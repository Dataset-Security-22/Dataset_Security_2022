<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Land extends Model
{
    use HasFactory;

    protected $table = "lands";

    protected $guarded = [''];

    public $timestamps = false;

    public function get_lapangan() {
        return $this->hasMany("App\Models\Field", "land_id", "id");
    }

    public function get_ruangan() {
        return $this->hasMany("App\Models\Room", "land_id", "id");
    }
}
