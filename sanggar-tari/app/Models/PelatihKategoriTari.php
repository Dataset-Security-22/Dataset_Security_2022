<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PelatihKategoriTari extends Model
{
    use HasFactory;

    protected $table = "pelatih_kategori_tari";

    protected $guarded = [''];

    public $timestamps = false;

    public function KategoriTari()
    {
    	return $this->belongsTo("App\Models\KategoriTari", "id_kategori", "id");
    }

    public function Pelatih()
    {
    	return $this->belongsTo("App\Models\Pelatih", "id_pelatih", "id");
    }

}
