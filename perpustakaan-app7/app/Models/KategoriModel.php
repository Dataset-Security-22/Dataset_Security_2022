<?php

namespace App\Models;
use App\models\BukuModel;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class KategoriModel extends Model{

    protected $table = "kategori";

    protected $guarded = [''];

    public $timestamps = false;

    public function getBuku()
    {
        return $this->hasOne("App\Models\BukuModel", "id_kategori", "id_kategori");
    }

}
