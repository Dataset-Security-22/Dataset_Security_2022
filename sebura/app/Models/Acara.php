<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Acara extends Model
{
    use HasFactory;
    protected $table = 'acaras';

    protected $fillable = ['nama_acara', 'tanggal_acara'];

    public function absensi()
    {
        return $this->hasMany(Absensi::class, 'id_acara', 'id');
    }

    public function panitia()
    {
        return $this->hasMany(PanitiaAcara::class, 'id_acara', 'id');
    }
}
