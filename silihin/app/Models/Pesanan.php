<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pesanan extends Model
{
    use HasFactory;

    protected $guarded = ['id', 'created_at', 'updated_at'];

    public function peminjam()
    {
        return $this->hasOne(User::class, 'id', 'id_peminjam');
    }

    public function penyewa()
    {
        return $this->hasOne(User::class, 'id', 'id_penyewa');
    }

    public function kendaraan()
    {
        return $this->hasOne(Kendaraan::class, 'id', 'id_kendaraan');
    }
}
