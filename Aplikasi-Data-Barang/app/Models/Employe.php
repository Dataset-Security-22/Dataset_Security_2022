<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Employe extends Model
{
    use HasFactory;

    protected $table = "employees";

    protected $guarded = [''];

    public $timestamps = false;

    public function get_peminjaman() {
    	return $this->hasMany("App\Models\Borrowing", "employee_id", "id");
    }
}
