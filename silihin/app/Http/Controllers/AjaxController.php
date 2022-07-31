<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

use App\Models\User;
use App\Models\Kendaraan;

class AjaxController extends Controller
{
    public function getAllKendaraan()
    {
        $kendaraan = Kendaraan::all();
        return view('kendaraan.allkendaraan', compact('kendaraan'));
    }

    public function getByKendaraan(Request $request)
    {
        $kendaraan = Kendaraan::where("nama_kendaraan", "like", "%".$request->term."%")->get();

        return view('kendaraan.allkendaraan', compact('kendaraan'));
    }

    public function getByKendaraanId($id = null)
    {
        $kendaraan = Kendaraan::find($id);
        return response()->json([
            'data' => $kendaraan,
            'nama_lengkap' => $kendaraan->user->nama_lengkap
        ]);
    }

}
