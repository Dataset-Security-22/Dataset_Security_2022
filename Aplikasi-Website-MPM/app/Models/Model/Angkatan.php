<?php

namespace App\Models\Model;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Angkatan extends Model
{
    use HasFactory;

    protected $table = "tb_angkatan";

    protected $guarded = [''];

    public $timestamps = false;
}
