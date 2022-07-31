<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Guru extends Model
{
    use HasFactory;

    protected $table = "guru";

    protected $guarded = [''];

    public $timestamps = false;

    public function kelas()
    {
    	return $this->hasOne("App\Models\Kelas", "nip_wali_kelas", "nip");
    }
}
