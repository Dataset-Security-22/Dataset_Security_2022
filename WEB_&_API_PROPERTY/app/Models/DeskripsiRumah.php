<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DeskripsiRumah extends Model
{
    use HasFactory;

    protected $table = "deskripsi_rumah";

    protected $guarded = [''];

    public $timestamps = false;

    public function getPerum(){
        return $this->belongsTo("App\Models\Perumahan", "perumahan_id", "id" );
    }

    public function getAlamat(){
        return $this->belongsTo("App\Models\Perumahan", "alamat_id", "id" );
    }

}
