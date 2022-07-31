<?php

namespace App\Http\Controllers;

use App\Models\Meja;
use App\Models\Menu;
use App\Models\Pesanan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class PesananController extends Controller
{
    public function pesanan_menu()
    {
        $data["data_menu"] = Menu::where("status_menu", "ada")->get();

        return view("content.pesanan.data_pemesanan_menu", $data);
    }

    public function detail_menu($id)
    {
        $data["detail"] = Menu::where("id", $id)->where("status_menu", "ada")->first();

        return view("content.pesanan.detail_menu", $data);
    }

    public function simpan_data_pesanan_menu(Request $req)
    {
        $harga = Menu::where("id", $req->id_menu)->first();
        $harga_satuan = $harga->harga_menu;
        $total = $req->qty * $harga_satuan;

        Pesanan::create([
            "id_menu" => $req->id_menu,
            "qty" => $req->qty,
            "harga" => $harga_satuan,
            "total" => $total
        ]);

        return redirect("/data_pesanan");
    }

    public function data_pesanan()
    {
        $data["data_pesanan"] = Pesanan::get();

        return view("content.pesanan.data_pesanan", $data);
    }

    public function update_data_pesanan(Request $req)
    {
        $harga = Menu::where("id", $req->id_menu)->first();
        $harga_satuan = $harga->harga_menu;
        $total = $harga_satuan * $req->qty;

        Pesanan::where("id", $req->id)->update([
            "qty" => $req->qty,
            "total" => $total
        ]);

        return redirect()->back();
    }

    public function delete($id)
    {
        Pesanan::where("id", $id)->delete();

        return redirect()->back();
    }

    public function data_pesan_menu()
    {
        $data["data_pesanan"] = Pesanan::get();
        $data["data_meja"] = Meja::where("status_meja", "ready")->get();

        return view("content.pesanan.data_pesan_menu", $data);
    }

    public function simpan_data_pemesanan_menu(Request $req)
    {
        $pembelian = DB::table('pesanan')
        ->join('menu', 'pesanan.id_menu','=','menu.id')
        ->get();

        $order = array();

        $order['tanggal_pesan'] = date("Y-m-d");
        $order['nama_pembeli'] = $req->nama_pembeli;
        $order['id_meja'] = $req->id_meja;
        $order['kode_order'] = $req->kode_order;
        $order['no_hp'] = $req->no_hp;
        $order['status_order'] = "terpesan";
        $order['id_user'] = Auth::user()->id;
        $pemesanan_menu_id = DB::table('pemesanan_menu')
        ->insertGetId($order);

        $beli = array();

        foreach($pembelian as $pm) {
            $beli['id_order'] = $pemesanan_menu_id;
            $beli['id_menu'] = $pm->id_menu;
            $beli['harga_menu'] = $pm->harga;
            $beli['jumlah_beli'] = $pm->qty;
            $beli['total'] = $pm->harga * $pm->qty;

            $product_purchase_id = DB::table('detail_pemesanan_menu')
            ->insertGetId($beli);

            $data_pemesanan = Pesanan::where("id_menu", $pm->id_menu)->first();
            $data_pemesanan->delete();
        }

        $meja = Meja::where("id", $req->id_meja)->first();
        $meja->status_meja = "terpesan";
        $meja->update();

        return redirect("/transaksi");
    }
}
