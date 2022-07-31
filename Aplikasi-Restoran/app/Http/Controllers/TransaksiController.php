<?php

namespace App\Http\Controllers;

use App\Models\Meja;
use App\Models\PemesananMenu;
use App\Models\Transaksi;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class TransaksiController extends Controller
{
    public function transaksi()
    {
        $data["data_pemesanan_menu"] = PemesananMenu::get();

        return view("content.transaksi.data_transaksi", $data);
    }

    public function bayar($id)
    {
        $data["detail"] = PemesananMenu::where("id", $id)->first();
        $data["detail_menu"] = DB::table("detail_pemesanan_menu")
        ->join("pemesanan_menu", "detail_pemesanan_menu.id_order","=","pemesanan_menu.id")
        ->where("detail_pemesanan_menu.id_order", $id)
        ->get();

        return view("content.transaksi.bayar", $data);
    }

    public function simpan_data_bayar_transaksi(Request $req)
    {
        Transaksi::create([
            "kode_transaksi" => $req->kode_transaksi,
            "id_pemesanan_menu" => $req->id_order,
            "bayar" => $req->bayar,
            "total" => $req->total,
            "kembali" => $req->bayar - $req->total,
            "status_transaksi" => "Sudah Lunas",
            "id_meja" => $req->id_meja,
            "id_user" => Auth::user()->id
        ]);

        Meja::where("id", $req->id_meja)->update([
            "status_meja" => "ready"
        ]);

        PemesananMenu::where("id", $req->id_order)->update([
            "status_order" => "selesai"
        ]);

        return redirect("/transaksi");
    }

    public function pembayaran_transaksi()
    {
        $data["data_transaksi"] = Transaksi::get();

        return view("content.transaksi.pembayaran_transaksi", $data);
    }

    public function detail_pembayaran($id)
    {
        $data["detail"] = Transaksi::where("id", $id)->first();

        return view("content.transaksi.detail_pembayaran", $data);
    }
}
