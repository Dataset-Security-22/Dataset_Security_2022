<?php

namespace App\Http\Controllers;

use App\Models\Pembayaran;
use App\Models\Tagihan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PembayaranController extends Controller
{
    public function data_pembayaran()
    {
        $data["data_tagihan"] = Tagihan::get();

        return view("content.pembayaran.pembayaran", $data);
    }

    public function bayar_tagihan($id)
    {
        $data["detail"] = Tagihan::where("id", $id)->first();

        return view("content.pembayaran.bayar_tagihan", $data);
    }

    public function post_pembayaran(Request $req)
    {
        Pembayaran::create([
            "id_pelanggan" => $req->id_pelanggan,
            "id_tagihan" => $req->id_tagihan,
            "tgl_bayar" => $req->tgl_bayar,
            "waktu_bayar" => date("h:i:s"),
            "bulan_bayar" => $req->bulan_bayar,
            "tahun_bayar" => $req->tahun_bayar,
            "jumlah_bayar" => $req->jumlah_bayar,
            "biaya_admin" => $req->biaya_admin,
            "total_akhir" => $req->total_akhir,
            "bayar" => $req->bayar,
            "kembali" => $req->bayar - $req->total_akhir,
            "id_petugas" => Auth::user()->id
        ]);

        Tagihan::where("id", $req->id_tagihan)->update([
            "status" => "Sudah Bayar"
        ]);

        return redirect("/pembayaran");
    }

    public function detail_data_pembayaran($id)
    {
        $data["detail"] = Pembayaran::where("id", $id)->first();

        return view("content.pembayaran.lihat_data_pembayaran", $data);
    }
}
