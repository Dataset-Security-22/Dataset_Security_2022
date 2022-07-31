<?php

namespace App\Http\Controllers;

use App\Models\Asset;
use App\Models\Good;
use App\Models\Room;
use App\Models\Stock;
use Illuminate\Http\Request;

class AssetController extends Controller
{
    public function asset() {
    	$data["data_ruangan"] = Room::get();
    	$data["data_barang"] = Good::get();
    	$data["data_asset"] = Asset::get();

    	return view("content.admin.asset.data_asset", $data);
    }

    public function tambah_asset(Request $request) {
        $message = [
            "unique" => "Nama :attribute tersebut sudah ada",
            "required" => "Kolom :attribute tidak boleh kosong",
            "min" => "Kolom :attribute harus diisi minimal :min digit",
            "max" => "Kolom :attribute tidak boleh lebih dari :max digit"
        ];

        $this->validate($request, [
            "room_id" => "required|min:1",
            "good_id" => "required",
            "quantity" => "required|min:1|numeric",
        ], $message);

        Asset::create([
            "room_id" => $request->room_id,
            "good_id" => $request->good_id,
            "quantity" => $request->quantity
        ]);

        $stok = Stock::where("good_id", $request->good_id)->first();
        $stok_qty = $stok->quantity;
        $stok->quantity = $stok_qty - $request->quantity;
        $stok->update();

    	return redirect()->back()->with("sukses", "Data Berhasil di Inputkan");
    }

    public function edit_asset($id) {
    	$data["data_ruangan"] = Room::get();
        $data["data_barang"] = Good::get();
        $data["data_asset"] = Asset::where("id", "!=",$id)->get();
        $data["edit"] = Asset::where("id", $id)->first();

        if (!$data["edit"]) {
            return redirect()->back()->with("error", "Data tidak ada");
        }

    	return view("content.admin.asset.edit_asset", $data);
    }

    public function update_asset(Request $request) {
        $message = [
            "unique" => "Nama :attribute tersebut sudah ada",
            "required" => "Kolom :attribute tidak boleh kosong",
            "min" => "Kolom :attribute harus diisi minimal :min digit",
            "max" => "Kolom :attribute tidak boleh lebih dari :max digit"
        ];

        $this->validate($request, [
            "room_id" => "required|min:1",
            "good_id" => "required",
            "quantity" => "required|min:1|numeric",
        ], $message);

    	Asset::where("id", $request->id)->update([
    		"room_id" => $request->room_id,
    		"good_id" => $request->good_id,
    		"quantity" => $request->quantity
    	]);

        $stok = Stock::where("good_id", $request->good_id)->first();
        $stok_qty = $stok->quantity;
        $stok_awal = $stok_qty + $request->qty_awal;
        $stok->quantity = $stok_awal - $request->quantity;
        $stok->update();

    	return redirect()->back()->with("sukses", "Data Berhasil di Update");
    }

    public function hapus_asset($id) {
    	Asset::where("id", $id)->delete();

    	return redirect()->back()->with("sukses", "Data Berhasil di Delete");
    }
}
