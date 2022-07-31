<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Condition extends Model
{
    use HasFactory;

    protected $table = "conditions";

    protected $guarded = [''];

    public $timestamps = false;

    public function get_assets() {
        return $this->belongsTo("App\Models\Asset", "asset_id", "id");
    }
}
