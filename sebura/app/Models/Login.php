<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Login extends Model
{
    use HasFactory;
    protected $table = 'login';
    protected $guarded = ['id', 'created_at', 'update_at'];

    public function roled()
    {
        return $this->hasOne(Role::class, 'id', 'role');
    }
}
