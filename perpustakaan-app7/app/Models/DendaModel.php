<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DendaModel extends Model
{
    use HasFactory;

    protected $table = "denda";

    protected $guarded = [''];

    public $timestamps = false;
}
