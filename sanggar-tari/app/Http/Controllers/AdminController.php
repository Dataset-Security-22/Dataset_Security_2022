<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Pelatih;
use App\Models\Murid;
use App\Models\KategoriTari;

class AdminController extends Controller
{
    public function dashboard()
    {
        $data = [
            "jumlah_pelatih" => Pelatih::count(),
            "jumlah_murid"   => Murid::count(),
            "jumlah_kategori_tari"  => KategoriTari::count()
        ];
        return view("/admin/dashboard" , $data);
    }
}
