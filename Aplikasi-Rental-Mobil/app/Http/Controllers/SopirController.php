<?php

namespace App\Http\Controllers;

use App\Models\Sopir;
use Illuminate\Http\Request;

class SopirController extends Controller
{
    public function data_sopir()
    {
    	$data["data_sopir"] = Sopir::get();

    	return view("content.sopir.data_sopir", $data);
    }

    public function simpan_data_sopir(Request $req)
    {
        $this->validate($req, [
            "id_sopir" => "required|numeric",
            "nama_sopir" => "required",
            "alamat_sopir" => "required",
            "telp_sopir" => "required",
            "no_sim" => "required|numeric",
            "tarif_perjam" => "required"
        ]);

        $sopir = new Sopir;

        $cek_double = $sopir->where(["id_sopir" => $req->id_sopir])->count();

        if ($cek_double > 0) {
            return redirect()->back();
        }

    	Sopir::create($req->all());

    	return redirect()->back();
    }

    public function edit_sopir(Request $req)
    {
        $data["edit"] = Sopir::where("id_sopir", $req->id_sopir)->first();

        return view("content.sopir.update_data_sopir", $data);
    }

    public function update_data_sopir(Request $req)
    {
        $this->validate($req, [
            "nama_sopir" => "required",
            "alamat_sopir" => "required",
            "telp_sopir" => "required",
            "no_sim" => "required|numeric",
            "tarif_perjam" => "required"
        ]);

        Sopir::where("id_sopir", $req->id_sopir)->update([
            "nama_sopir" => $req->nama_sopir,
            "alamat_sopir" => $req->alamat_sopir,
            "telp_sopir" => $req->telp_sopir,
            "no_sim" => $req->no_sim,
            "tarif_perjam" => $req->tarif_perjam
        ]);

        return redirect()->back();
    }

    public function delete_data_sopir($id_sopir)
    {
        Sopir::where("id_sopir", $id_sopir)->delete();

        return redirect()->back();
    }
}
