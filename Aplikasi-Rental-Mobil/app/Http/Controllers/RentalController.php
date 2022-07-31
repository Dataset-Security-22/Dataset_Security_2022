<?php

namespace App\Http\Controllers;

use App\Models\Kendaraan;
use App\Models\Pelanggan;
use App\Models\Sopir;
use App\Models\Transaksi;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class RentalController extends Controller
{
    public function detail_kendaraan($id)
    {
    	$data["detail"] = Kendaraan::where("id", $id)->first();

    	return view("content.rental.detail_kendaraan", $data);
    }

    public function create_transaksi($id)
    {
    	$data["data_sopir"] = Sopir::where("aktif", 0)->get();

    	$data["detail"] = Kendaraan::where("id", $id)->first();

    	return view("content.rental.create_transaksi", $data);
    }

    public function simpan_data_transaksi(Request $req)
    {
        $this->validate($req, [
            "no_transaksi" => "required|numeric",
            "tgl_pesan" => "required",
            "tgl_pinjam" => "required",
            "tgl_kembali_rencana" => "required",
            "tgl_kembali_realisasi" => "required",
            "kilometer_perjam" => "required",
            "bbm_pinjam" => "required",
            "kondisi_mobil_pinjam" => "required",
            "id_sopir" => "required",
            "id_kendaraan" => "required"
        ]);
    	$trans = new Transaksi;
    	$trans->no_transaksi = $req->no_transaksi;
    	$trans->tgl_pesan = $req->tgl_pesan;
    	$trans->tgl_pinjam = $req->tgl_pinjam;
    	$trans->jam_pinjam = date("H:i:s");
    	$trans->tgl_kembali_rencana = $req->tgl_kembali_rencana;
        $trans->tgl_kembali_realisasi = $req->tgl_kembali_realisasi;
    	$trans->kilometer_perjam = $req->kilometer_perjam;
    	$trans->bbm_pinjam = $req->bbm_pinjam;
    	$trans->kondisi_mobil_pinjam = $req->kondisi_mobil_pinjam;
    	$trans->id_sopir = $req->id_sopir;
    	$trans->id_kendaraan = $req->id_kendaraan;
    	$trans->id_petugas = Auth::user()->id;
        $trans->status_pengembalian = "Belum di Kembalikan";
    	$trans->save();

    	$pelanggan = new Pelanggan;
    	$pelanggan->no_ktp = $req->no_ktp;
    	$pelanggan->nama_pel = $req->nama_pel;
    	$pelanggan->alamat_pel = $req->alamat_pel;
    	$pelanggan->telp_pel = $req->telp_pel;
    	$pelanggan->id_transaksi = $trans->id;
    	$pelanggan->save();

        $data_sopir = Sopir::where("id_sopir", $req->id_sopir)->update([
            "aktif" => 1
        ]);

    	Kendaraan::where("id", $req->id_kendaraan)->update([
    		"status_rental" => "Tidak Tersedia"
    	]);

        $kendaraan = Kendaraan::where("id", $req->id_kendaraan)->first();
        $tarif_perjam_kendaraan = $kendaraan->tarif_perjam;

        $sopir = Sopir::where("id_sopir", $req->id_sopir)->first();
        $tarif_perjam_sopir = $sopir->tarif_perjam;

        Transaksi::where("id", $trans->id)->update([
            "bayar_rental" => $tarif_perjam_sopir + $tarif_perjam_kendaraan
        ]);

    	return redirect("/dashboard");
    }
}
