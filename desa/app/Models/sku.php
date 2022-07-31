<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class sku extends Model
{
    use HasFactory;

    protected $table = "tabel_sku";

    protected $guarded = [''];

    public $timestamps = false;
}
