<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Oprec extends Model
{
    use HasFactory;
    protected $table = 'oprecs';
    protected $fillable = [
        'nim',
        'nama',
        'tempat',
        'ttl',
        'no_telp',
        'email',
        'jurusan',
        'alasan',
        'gambar'
    ];
}
