<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Admin extends Model
{
    use HasFactory;

    protected $table = "admin";

    protected $guarded = [''];

    public function getUser()
    {
        return $this->belongsTo("App\Models\User", "id", "id");
    }

}


