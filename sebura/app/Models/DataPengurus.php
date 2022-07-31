<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class DataPengurus extends  Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    protected $table = 'data_penguruses';
    protected $fillable = [
        'nama',
        'email',
        'password',
        'role',
        'prodi',
        'jabatan',
        'divisi_sebura',
        'tahun_kepengurusan',
        'gambar',
    ];

    public function absensi()
    {
        return $this->hasMany(Absensi::class, 'id_pengurus', 'id');
    }

    public function panitia()
    {
        return $this->hasMany(PanitiaAcara::class, 'id_pengurus', 'id');
    }

    public function roled()
    {
        return $this->hasOne(Role::class, 'id', 'role');
    }

    public function getjabatan()
    {
        return $this->hasOne(Jabatan::class, "id", 'jabatan');
    }

    public function getprodi()
    {
        return $this->hasOne(Prodi::class, "id", 'prodi');
    }

    public function getdivisi()
    {
        return $this->hasOne(Divisi::class, "id", 'divisi_sebura');
    }
}
