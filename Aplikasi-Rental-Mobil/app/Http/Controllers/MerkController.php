<?php

namespace App\Http\Controllers;

use App\Models\Merk;
use Illuminate\Http\Request;

class MerkController extends Controller
{
    public function data_merk()
    {
    	$data["data_merk"] = Merk::get();

    	return view("content.merk.data_merk", $data);
    }

    public function simpan_data_merk(Request $req)
    {
        $this->validate($req, [
            "kode_merk" => "required|numeric",
            "nama_merk" => "required"
        ]);

        $merk = new Merk;

        $cek_double = $merk->where(["kode_merk" => $req->kode_merk])->count();

        if ($cek_double > 0) {
            return redirect()->back();
        }

    	Merk::create($req->all());

    	return redirect()->back();
    }

    public function edit_merk(Request $req)
    {
    	$data["edit"] = Merk::where("kode_merk", $req->kode_merk)->first();

    	return view("content.merk.update_data_merk", $data);
    }

    public function update_data_merk(Request $req)
    {
        $this->validate($req, [
            "kode_merk" => "required|numeric",
            "nama_merk" => "required"
        ]);

    	Merk::where("kode_merk", $req->kode_merk)->update([
    		"nama_merk" => $req->nama_merk
    	]);

    	return redirect()->back();
    }

    public function delete_data_merk($kode_merk)
    {
    	Merk::where("kode_merk", $kode_merk)->delete();

    	return redirect()->back();
    }
}
