<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;

    protected $table = "categories";

    protected $guarded = [''];

    public $timestamps = false;

    public function get_category() {
        return $this->belongsTo("App\Models\Category", "good_id", "id");
    }

    public function get_goods() {
        return $this->hasMany("App\Models\Good", "category_id", "id");
    }
}
