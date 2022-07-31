<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Kemampuan extends Model
{
    use HasFactory;

    protected $table = "kemampuan";

    protected $guarded = [''];

    public $timestamps = false;
}
