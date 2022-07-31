<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class JenisService extends Model
{
    use HasFactory;

    protected $table = "jenis_service";

    protected $guarded = [''];

    public $timestamps = false;
}
