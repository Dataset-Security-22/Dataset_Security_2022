<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Absen extends Model
{
    use HasFactory;

    protected $table = "absen";

    protected $guarded = [''];

    public $timestamps = false;

    public function siswa()
    {
    	return $this->belongsTo("App\Models\Siswa", "nis_siswa", "nis");
    }
}
