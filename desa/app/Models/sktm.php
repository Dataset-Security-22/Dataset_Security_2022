<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class sktm extends Model
{
    use HasFactory;

    protected $table = "tbl_sktm";

    protected $guarded = [''];

    public $timestamps = false;
}
