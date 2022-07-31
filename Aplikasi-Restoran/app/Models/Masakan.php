<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Masakan extends Model
{
    use HasFactory;

    protected $table = "masakan";

    protected $guarded = [''];

    public $timestamps = false;

    public function rs_data_makanan()
    {
        return $this->hasMany("App\Models\DetailOrder", "id_masakan", "id");
    }

}
