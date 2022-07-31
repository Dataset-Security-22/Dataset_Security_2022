<?php

namespace App\Models\Model;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Aspirasi extends Model
{
    use HasFactory;

    protected $table = "tb_aspirasi";

    protected $guarded = [''];

    public $timestamps = false;
}
