<?php

namespace App\Http\Controllers;

use App\Models\Kendaraan;
use App\Models\Pelanggan;
use App\Models\Sopir;
use App\Models\Transaksi;
use Illuminate\Http\Request;

class PengembalianController extends Controller
{
    public function data_pengembalian()
    {
    	$data["data_pelanggan"] = Pelanggan::get();

    	return view("content.pengembalian.data_pengembalian", $data);
    }

    public function detail_pengembalian($id)
    {
    	$data["detail"] = Pelanggan::where("id", $id)->first();

    	return view("content.pengembalian.detail_pengembalian", $data);
    }

    public function update_data_pengembalian(Request $req)
    {
        $this->validate($req, [
            "kilometer_kembali" => "required",
            "bbm_kembali" => "required",
            "kondisi_mobil_kembali" => "required",
            "kerusakan" => "required"
        ]);

    	Transaksi::where("id", $req->id)->update([
    		"kilometer_kembali" => $req->kilometer_kembali,
    		"bbm_kembali" => $req->bbm_kembali,
    		"kondisi_mobil_kembali" => $req->kondisi_mobil_kembali,
    		"kerusakan" => $req->kerusakan,
    		"denda" => $req->denda,
    		"bayar_denda_pengembalian" => $req->bayar_denda_pengembalian,
            "status_pengembalian" => "Sudah di Kembalikan"
    	]);

    	Kendaraan::where("id", $req->id_kendaraan)->update([
    		"status_rental" => "Tersedia"
    	]);

        Sopir::where("id_sopir", $req->id_sopir)->update([
            "aktif" => 0
        ]);

    	return redirect("/pengembalian");
    }

    public function rental_kembali($id)
    {
    	$data["detail"] = Pelanggan::where("id", $id)->first();

    	return view("content.pengembalian.detail_rental_kembali", $data);
    }
}
