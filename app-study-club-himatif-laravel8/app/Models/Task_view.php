<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Task_view extends Model
{
    use HasFactory;

    protected $fillable = ['id_student', 'id_task'];
}
