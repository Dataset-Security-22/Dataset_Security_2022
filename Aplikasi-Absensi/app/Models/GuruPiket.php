<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class GuruPiket extends Model
{
    use HasFactory;

    protected $table = "jadwal_piket";

    protected $guarded = [''];

    public $timestamps = false;

    public function guru()
    {
    	return $this->belongsTo("App\Models\Guru", "nip_guru", "nip");
    }
}
