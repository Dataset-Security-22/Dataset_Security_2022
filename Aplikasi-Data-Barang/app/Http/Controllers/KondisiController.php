<?php

namespace App\Http\Controllers;

use App\Models\Asset;
use App\Models\Condition;
use Illuminate\Http\Request;

class KondisiController extends Controller
{
    public function kondisi() {
    	$data["data_asset"] = Asset::get();
    	$data["data_kondisi"] = Condition::get();

    	return view("content.admin.kondisi.data_kondisi", $data);
    }

    public function tambah_kondisi(Request $request) {
          $message = [
        "unique" => "Nama :attribute tersebut sudah ada",
        "required" => "Kolom :attribute tidak boleh kosong",
        "min" => "Kolom :attribute harus diisi minimal :min digit",
        "max" => "Kolom :attribute tidak boleh lebih dari :max digit",
        "numeric" => "Kolom :attribute harus angka"
        ];

        $this->validate($request, [
            "asset_id" => "required|min:1",
            "quantity" => "required|min:1|numeric",
            "condition" => "required"
            ], $message);

    	Condition::create($request->all());

    	return redirect()->back()->with("sukses", "Data Berhasil di Inputkan");
    }

    public function edit_kondisi($id) {
        $data["data_asset"] = Asset::get();
        $data["data_kondisi"] = Condition::where("id", "!=", $id)->get();
        $data["edit"] = Condition::where("id", $id)->first();

        if (!$data["edit"]) {
            return redirect()->back()->with("error", "Data tidak ada");
        }

    	return view("content.admin.kondisi.edit_kondisi", $data);
    }

    public function update_kondisi(Request $request) {
        $message = [
        "unique" => "Nama :attribute tersebut sudah ada",
        "required" => "Kolom :attribute tidak boleh kosong",
        "min" => "Kolom :attribute harus diisi minimal :min digit",
        "max" => "Kolom :attribute tidak boleh lebih dari :max digit",
        "numeric" => "Kolom :attribute harus angka"
        ];

        $this->validate($request, [
            "asset_id" => "required|min:1",
            "quantity" => "required|min:1|numeric",
            "condition" => "required"
            ], $message);

    	Condition::where("id", $request->id)->update([
    		"asset_id" => $request->asset_id,
    		"quantity" => $request->quantity,
    		"condition" => $request->condition
    	]);

    	return redirect()->back()->with("sukses", "Data Berhasil di Update");
    }

    public function delete_kondisi($id) {
    	Condition::where("id", $id)->delete();

    	return redirect()->back()->with("sukses", "Data Berhasil di Delete");
    }
}
