<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Model\Aspirasi;
use Illuminate\Support\Facades\Auth;

class AspirasiController extends Controller
{
	public function form_aspirasi()
	{
		return view("page/user/aspirasi/form_aspirasi");
	}

    public function data_aspirasi()
    {
    	return view("page/user/aspirasi/data_aspirasi");
    }

    public function tambah(Request $request)
    {
    	Aspirasi::create([
            "nim_anggota" => auth()->user()->nim,
            "judul_aspirasi" => $request->judul_aspirasi,
            "pesan" => $request->pesan,
            "tanggal_aspirasi" => date("Y-m-d")
        ]);

        return redirect()->back();
    }
}
