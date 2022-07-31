<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Good extends Model
{
    use HasFactory;

    protected $table = "goods";

    protected $guarded = [''];

    public $timestamps = false;

    public function get_category() {
        return $this->belongsTo("App\Models\Category", "category_id", "id");
    }

    public function get_attribute() {
        return $this->hasMany("App\Models\Attribute", "good_id", "id");
    }

    public function get_stok() {
        return $this->hasMany("App\Models\Stock", "good_id", "id");
    }
}
