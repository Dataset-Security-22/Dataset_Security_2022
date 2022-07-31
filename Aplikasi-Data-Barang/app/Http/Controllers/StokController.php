<?php

namespace App\Http\Controllers;

use App\Models\Good;
use App\Models\Stock;
use Illuminate\Http\Request;

class StokController extends Controller
{
    public function stok() {
        $data["data_barang"] = Good::get();
        $data["data_stok"] = Stock::get();

        return view("content.admin.stok.data_stok", $data);
    }

    public function tambah_stock(Request $request) {

        $message = [
            "unique" => "Nama :attribute tersebut sudah ada",
            "required" => "Kolom :attribute tidak boleh kosong",
            "min" => "Kolom :attribute harus diisi minimal :min digit",
            "max" => "Kolom :attribute tidak boleh lebih dari :max digit",
            "numeric" => "Kolom :attribute harus angka"
        ];

        $this->validate($request, [
            "category_id" => "required|min:1",
            "image" => "required",
            "name" => "required",
            "details" => "required"
        ], $message);

        Stock::create([
            "good_id" => $request->good_id,
            "type" => $request->type,
            "date" => date("Y-m-d"),
            "quantity" => $request->quantity,
            "details" => $request->details
        ]);

        return redirect()->back()->with("sukses", "Data Berhasil di Inputkan");
    }

    public function ajax_edit_stok(Request $request) {
        $data["data_barang"] = Good::get();
        $data["data_stok"] = Stock::get();
        $data["edit"] = Stock::where("id", $request->id)->first();

        return view("content.admin.stok.edit_stok", $data);
    }

    public function update_stok(Request $request) {
        $message = [
            "unique" => "Nama :attribute tersebut sudah ada",
            "required" => "Kolom :attribute tidak boleh kosong",
            "min" => "Kolom :attribute harus diisi minimal :min digit",
            "max" => "Kolom :attribute tidak boleh lebih dari :max digit"
        ];

        $this->validate($request, [
            "good_id" => "required|min:1",
            "type" => "required",
            "quantity" => "required|min:1|numeric",
            "details" => "required"
        ], $message);

        Stock::where("id", $request->id)->update([
            "good_id" => $request->good_id,
            "type" => $request->type,
            "quantity" => $request->quantity,
            "details" => $request->details
        ]);

        return redirect()->back()->with("sukses", "Data berhasil di update");
    }

    public function hapus_stok($id) {
        Stock::where("id", $id)->delete();

        return redirect()->back()->with("sukses", "Data berhasil di hapus");
    }
}
