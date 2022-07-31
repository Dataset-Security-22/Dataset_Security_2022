<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Model\HubungiKami;

class HubungiKamiController extends Controller
{
    public function tambah(Request $request)
    {
    	HubungiKami::create([
    		"nama" => $request->nama,
    		"email" => $request->email,
    		"judul" => $request->judul,
    		"pesan" => $request->pesan
    	]);

    	return redirect()->back()->with("sukses", "Berhasil Terkirim");
    }

    public function hubungi_kami()
    {
        $data = [
            "data_hubungi_kami" => HubungiKami::orderBy("nama", "DESC")->get()
        ];

        return view("/page/admin/hubungi_kami/data_hubungi_kami", $data);
    }
}
