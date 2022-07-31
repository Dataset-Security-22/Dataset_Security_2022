<?php

namespace App\Http\Controllers;

use App\Models\Pemilik;
use Illuminate\Http\Request;

class PemilikController extends Controller
{
    public function data_pemilik()
    {
    	$data["data_pemilik"] = Pemilik::get();

    	return view("content.pemilik.data_pemilik", $data);
    }

    public function simpan_data_pemilik(Request $req)
    {
        $this->validate($req, [
            "kode_pemilik" => "required",
            "nama_pemilik" => "required",
            "alamat_pemilik" => "required",
            "telp_pemilik" => "required"
        ]);

        $pemilik = new Pemilik;

        $cek_double = $pemilik->where(["kode_pemilik" => $req->kode_pemilik])->count();

        if ($cek_double > 0) {
            return redirect()->back();
        }

    	Pemilik::create($req->all());

    	return redirect()->back();
    }

    public function edit_pemilik(Request $req)
    {
    	$data["edit"] = Pemilik::where("id_pemilik", $req->id_pemilik)->first();

    	return view("content.pemilik.update_data_pemilik", $data);
    }

    public function update_data_pemilik(Request $req)
    {
        $this->validate($req, [
            "kode_pemilik" => "required",
            "nama_pemilik" => "required",
            "alamat_pemilik" => "required",
            "telp_pemilik" => "required"
        ]);

    	Pemilik::where("id_pemilik", $req->id_pemilik)->update([
            "kode_pemilik" => $req->kode_pemilik,
    		"nama_pemilik" => $req->nama_pemilik,
    		"alamat_pemilik" => $req->alamat_pemilik,
    		"telp_pemilik" => $req->telp_pemilik
    	]);

    	return redirect()->back();
    }

    public function delete_data_pemilik($id_pemilik)
    {
    	Pemilik::where("id_pemilik", $id_pemilik)->delete();

    	return redirect()->back();
    }
}
