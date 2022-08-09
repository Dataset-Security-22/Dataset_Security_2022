<?php

namespace App\Http\Controllers;

use App\Models\Pelanggan;
use App\Models\Penggunaan;
use Illuminate\Http\Request;

class PenggunaanController extends Controller
{
    public function data_penggunaan()
    {
        $data["data_penggunaan"] = Penggunaan::get();
        $data["data_pelanggan"] = Pelanggan::get();

        return view("content.penggunaan.penggunaan", $data);
    }

    public function post_penggunaan(Request $req)
    {
        $message = [
            "required" => "Kolom :attribute tidak boleh kosong"
        ];

        $this->validate($req, [
            "id_penggunaan" => "required",
            "id_pelanggan" => "required",
            "bulan" => "required",
            "tahun" => "required",
            "meter_awal" => "required",
            "meter_akhir" => "required",
            "tgl_cek" => "required"
        ], $message);

        Penggunaan::create($req->all());

        return redirect()->back()->with("sukses", "Data berhasil di inputkan");
    }

    public function edit_penggunaan(Request $req)
    {
        $data["data_pelanggan"] = Pelanggan::get();
        $data["edit"] = Penggunaan::where("id_penggunaan", $req->id_penggunaan)->first();

        return view("content.penggunaan.edit_penggunaan", $data);
    }

    public function put_penggunaan(Request $req)
    {
        $message = [
            "required" => "Kolom :attribute tidak boleh kosong"
        ];

        $this->validate($req, [
            "id_pelanggan" => "required",
            "bulan" => "required",
            "tahun" => "required",
            "meter_awal" => "required",
            "meter_akhir" => "required",
            "tgl_cek" => "required"
        ], $message);

        Penggunaan::where("id_penggunaan", $req->id_penggunaan)->update([
            "id_pelanggan" => $req->id_pelanggan,
            "meter_awal" => $req->meter_awal,
            "meter_akhir" => $req->meter_akhir
        ]);

        return redirect()->back()->with("sukses", "Data berhasil di ubah");
    }

    public function hapus_penggunaan($id_penggunaan)
    {
        Penggunaan::where("id_penggunaan", $id_penggunaan)->delete();

        return redirect()->back()->with("sukses", "Data berhasil di hapus");
    }

    public function lihat_data($id_penggunaan)
    {
        $data["lihat"] = Penggunaan::where("id_penggunaan", $id_penggunaan)->first();

        return view("content.tagihan.lihat_data_penggunaan", $data);
    }

    public function detail_penggunaan($id_penggunaan)
    {
        $data["detail"] = Penggunaan::where("id_penggunaan", $id_penggunaan)->first();

        return view("content.penggunaan.detail_penggunaan", $data);
    }
}
