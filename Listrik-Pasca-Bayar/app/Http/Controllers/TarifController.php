<?php

namespace App\Http\Controllers;

use App\Models\Tarif;
use Illuminate\Http\Request;

class TarifController extends Controller
{
    public function data_tarif()
    {
        $data["data_tarif"] = Tarif::orderBy("kode_tarif", "ASC")->get();

        return view("content.tarif.tarif", $data);
    }

    public function post_tarif(Request $req)
    {
        $message = [
            "required" => "Kolom :attribute tidak boleh kosong"
        ];

        $this->validate($req, [
            "kode_tarif" => "required",
            "golongan" => "required",
            "daya" => "required",
            "tarif_perkwh" => "required"
        ], $message);

        Tarif::create($req->all());

        return redirect()->back()->with("sukses", "Data berhasil di inputkan");
    }

    public function edit_tarif(Request $req)
    {
        $data["edit"] = Tarif::where("id", $req->id)->first();

        return view("content.tarif.edit_tarif", $data);
    }

    public function put_tarif(Request $req)
    {
        $message = [
            "required" => "Kolom :attribute tidak boleh kosong"
        ];

        $this->validate($req, [
            "kode_tarif" => "required",
            "golongan" => "required",
            "daya" => "required",
            "tarif_perkwh" => "required"
        ], $message);

        Tarif::where("id", $req->id)->update([
            "kode_tarif" => $req->kode_tarif,
            "golongan" => $req->golongan,
            "daya" => $req->daya,
            "tarif_perkwh" => $req->tarif_perkwh
        ]);

        return redirect()->back()->with("error", "Data gagal di edit");
    }

    public function hapus_tarif($id)
    {
        Tarif::where("id", $id)->delete();

        return redirect()->back()->with("sukses", "Data berhasil di hapus");
    }
}
