<?php

namespace App\Models\Model;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Proker extends Model
{
    use HasFactory;

    protected $table = "tb_proker";

    protected $guarded = [''];

    public $timestamps = false;
}
