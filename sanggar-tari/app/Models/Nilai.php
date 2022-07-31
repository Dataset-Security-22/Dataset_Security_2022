<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Nilai extends Model
{
    protected $table = "nilai";

    protected $guarded = [''];

    public $timestamps = false;

    public function getMurid() {
        return $this->belongsTo("App\Models\Murid", "id_murid", "id");
    }

}
