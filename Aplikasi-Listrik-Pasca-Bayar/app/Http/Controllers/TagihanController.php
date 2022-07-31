<?php

namespace App\Http\Controllers;

use App\Models\Pelanggan;
use App\Models\Penggunaan;
use App\Models\Tagihan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class TagihanController extends Controller
{
    public function detail_tagihan($id_penggunaan)
    {
        $data["detail"] = Penggunaan::where("id_penggunaan", $id_penggunaan)->first();

        return view("content.tagihan.detail_tagihan", $data);
    }

    public function data_tagihan_pengguna()
    {
        $data["data_tagihan"] = Tagihan::get();

        return view("content.tagihan.data_tagihan_pengguna", $data);
    }

    public function data_tagihan()
    {
        $data["data_penggunaan"] = Penggunaan::get();

        return view("content.tagihan.tagihan", $data);
    }

    public function post_tagihan(Request $req)
    {
        Tagihan::create([
            "id_pelanggan" => $req->id_pelanggan,
            "id_penggunaan" => $req->id_penggunaan,
            "bulan" => $req->bulan,
            "tahun" => $req->tahun,
            "jumlah_meter" => $req->jumlah_meter,
            "tarif_perkwh" => $req->tarif_perkwh,
            "jumlah_bayar" => $req->jumlah_bayar,
            "status" => "Belum Bayar",
            "id_petugas" => Auth::user()->id
        ]);

        return redirect("/tagihan-pengguna")->with("sukses", "Data berhasil di Inputkan");
    }

    public function detail_tagihan_pengguna($id)
    {
        $data["detail"] = Tagihan::where("id", $id)->first();

        return view("content.tagihan.detail_data_tagihan_pengguna", $data);
    }

    public function detail($id)
    {
        $data["data_pelanggan"] = Pelanggan::get();
        $data["data_pengguna"] = Penggunaan::get();
        $data["detail"] = Penggunaan::where("id", $id)->first();

        return view("content.tagihan.detail_data_tagihan", $data);
    }
}
