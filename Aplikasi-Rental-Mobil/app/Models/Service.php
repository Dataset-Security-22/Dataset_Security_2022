<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Service extends Model
{
    use HasFactory;

    protected $table = "tb_service";

    protected $guarded = [''];

    public $timestamps = false;

    public function re_jenis_service()
    {
    	return $this->belongsTo("App\Models\JenisService", "id_jenis_service", "id_jenis_service");
    }
}
