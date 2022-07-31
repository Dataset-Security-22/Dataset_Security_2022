<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Kendaraan;
use App\Models\User;

class SearchController extends Controller
{
    public function searchKendaraan()
    {
        $kendaraan = Kendaraan::where('nama_kendaraan', 'like', '%'.$_GET['term'].'%')->get();

        $data = array();

        foreach ($kendaraan as $k) {
            $data[] = "[".$k->user->nama_lengkap."] " . $k->nama_kendaraan;
        }

        return response()->json($data);
    }
}
