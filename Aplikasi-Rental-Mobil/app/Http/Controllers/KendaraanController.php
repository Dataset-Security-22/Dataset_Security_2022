<?php

namespace App\Http\Controllers;

use App\Models\Kendaraan;
use App\Models\Pemilik;
use App\Models\Type;
use Illuminate\Http\Request;
use File;

class KendaraanController extends Controller
{
    public function data_kendaraan()
    {
        $data["data_type"] = Type::get();
    	$data["data_pemilik"] = Pemilik::get();
    	$data["data_kendaraan"] = Kendaraan::get();

    	return view("content.kendaraan.data_kendaraan", $data);
    }

    public function simpan_data_kendaraan(Request $req)
    {
        $this->validate($req, [
            "no_plat" => "required",
            "tahun" => "required",
            "tarif_perjam" => "required",
            "kode_pemilik" => "required",
            "kode_type" => "required",
            "image" => "required"
        ]);

    	$save = Kendaraan::create($req->all());

        $file = $req->file("image");
        $fileName = $file->getClientOriginalName();
        $req->file("image")->move("public/images", $fileName);

        $save->image = $fileName;
        $save->save();

    	return redirect()->back();
    }

    public function edit_kendaraan(Request $req)
    {
        $data["data_type"] = Type::get();
    	$data["data_pemilik"] = Pemilik::get();
    	$data["edit"] = Kendaraan::where("id", $req->id)->first();

        return view("content.kendaraan.update_data_kendaraan", $data);
    }

    public function update_data_kendaraan(Request $req)
    {
        $this->validate($req, [
            "no_plat" => "required",
            "tahun" => "required",
            "tarif_perjam" => "required",
            "kode_pemilik" => "required",
            "kode_type" => "required",
            "image" => "required"
        ]);

        $update = Kendaraan::where("id", $req->id)->first();

        $update->no_plat = $req->no_plat;
        $update->tahun = $req->tahun;
        $update->tarif_perjam = $req->tarif_perjam;
        $update->kode_pemilik = $req->kode_pemilik;
        $update->kode_type = $req->kode_type;

        if ($req->file("image") == "")
        {
            $update->image = $update->image;
        } else {
            File::delete("public/images/".$update->image);

            $file = $req->file("image");
            $fileName = $file->getClientOriginalName();
            $req->file("image")->move("public/images",$fileName);
            $update->image = $fileName;
        }

        $update->update();

    	return redirect()->back();
    }

    public function delete_data_kendaraan($id)
    {
        $delete = Kendaraan::where("id", $id)->first();
        File::delete("public/images".$delete->image);

    	return redirect()->back();
    }
}
