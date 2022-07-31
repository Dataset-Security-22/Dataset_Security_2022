<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Borrowing extends Model
{
    use HasFactory;

    protected $table = "borrowings";

    protected $guarded = [''];

    public $timestamps = false;

    public function get_users() {
        return $this->belongsTo("App\Models\User", "user_id", "id");
    }

    public function get_goods() {
        return $this->belongsTo("App\Models\Good", "good_id", "id");
    }

    public function get_karyawan() {
        return $this->belongsTo("App\Models\Employe", "employee_id", "id");
    }
}
