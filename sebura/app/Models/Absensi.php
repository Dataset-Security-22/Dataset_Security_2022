<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Absensi extends Model
{
    use HasFactory;
    protected $table = 'absensis';
    protected $fillable = [
        'id_acara',
        'id_pengurus',
        'keterangan'
    ];


    public function acara()
    {
        return $this->belongsTo(Acara::class, 'id_acara', 'id');
    }

    public function pengurus()
    {
        return $this->belongsTo(DataPengurus::class, 'id_pengurus', 'id');
    }
}
