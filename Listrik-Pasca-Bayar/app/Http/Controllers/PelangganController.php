<?php

namespace App\Http\Controllers;

use App\Models\Pelanggan;
use App\Models\Tarif;
use Illuminate\Http\Request;

class PelangganController extends Controller
{
    public function data_pelanggan()
    {
        $data["data_tarif"] = Tarif::orderBy("kode_tarif", "ASC")->get();
        $data["data_pelanggan"] = Pelanggan::get();

        return view("content.pelanggan.pelanggan", $data);
    }

    public function post_pelanggan(Request $req)
    {
        $message = [
            "required" => "Kolom :attribute tidak boleh kosong"
        ];

        $this->validate($req, [
            "no_meter" => "required",
            "nama" => "required",
            "alamat" => "required",
            "id_tarif" => "required"
        ], $message);

        Pelanggan::create($req->all());

        return redirect()->back()->with("sukses", "Data berhasil di inputkan");
    }

    public function hapus_pelanggan($id_pelanggan)
    {
        Pelanggan::where("id_pelanggan", $id_pelanggan)->delete();

        return redirect()->back()->with("sukses", "Data berhasil di hapus");
    }

    public function edit_pelanggan(Request $req)
    {
        $data["data_tarif"] = Tarif::orderBy("kode_tarif", "ASC")->get();
        $data["edit"] = Pelanggan::where("id_pelanggan", $req->id_pelanggan)->first();

        return view("content.pelanggan.edit_pelanggan", $data);
    }

    public function put_pelanggan(Request $req)
    {
        $message = [
            "required" => "Kolom :attribute tidak boleh kosong"
        ];

        $this->validate($req, [
            "no_meter" => "required",
            "nama" => "required",
            "alamat" => "required",
            "id_tarif" => "required"
        ], $message);

        Pelanggan::where("id_pelanggan", $req->id_pelanggan)->update([
            "no_meter" => $req->no_meter,
            "nama" => $req->nama,
            "alamat" => $req->alamat,
            "id_tarif" => $req->id_tarif
        ]);

        return redirect()->back()->with("sukses", "Data berhasil di edit");
    }
}
