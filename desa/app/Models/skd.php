<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class skd extends Model
{
    use HasFactory;

    protected $table = "tbl_skd";

    protected $guarded = [''];

    public $timestamps = false;
}
