<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FotoSyarat extends Model
{
    use HasFactory;

    protected $table = "foto_syarat";

    protected $guarded = [''];

    public $timestamps = false;
}
