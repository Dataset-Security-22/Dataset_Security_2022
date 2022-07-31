<?php

namespace App\Http\Controllers;

use App\Models\Land;
use App\Models\Room;
use Illuminate\Http\Request;

class RuanganController extends Controller
{
    public function ruangan() {
    	$data["data_tanah"] = Land::get();
    	$data["data_ruangan"] = Room::get();

    	return view("content.admin.ruangan.data_ruangan", $data);
    }

    public function tambah_ruangan(Request $request) {
        $message = [
        "unique" => "Nama :attribute tersebut sudah ada",
        "required" => "Kolom :attribute tidak boleh kosong",
        "min" => "Kolom :attribute harus diisi minimal :min digit",
        "max" => "Kolom :attribute tidak boleh lebih dari :max digit",
        "numeric" => "Kolom :attribute harus angka"
        ];

        $this->validate($request, [
            "land_id" => "required|min:1",
            "name" => "required",
            "length" => "required|min:1|numeric",
            "width" => "required|min:1|numeric",
            "height" => "required|min:1|numeric",
            "condition" => "required",
            "details" => "required"
            ], $message);

    	Room::create($request->all());

    	return redirect()->back()->with("sukses", "Data Berhasil di Inputkan");
    }

    public function ajax_edit_ruangan(Request $request) {
    	$data["data_tanah"] = Land::get();
    	$data["edit"] = Room::where("id", $request->id)->first();

    	return view("content.admin.ruangan.edit_ruangan", $data);
    }

    public function update_ruangan(Request $request) {
        $message = [
        "unique" => "Nama :attribute tersebut sudah ada",
        "required" => "Kolom :attribute tidak boleh kosong",
        "min" => "Kolom :attribute harus diisi minimal :min digit",
        "max" => "Kolom :attribute tidak boleh lebih dari :max digit",
        "numeric" => "Kolom :attribute harus angka"
        ];

        $this->validate($request, [
            "land_id" => "required|min:1",
            "name" => "required",
            "length" => "required|min:1|numeric",
            "width" => "required|min:1|numeric",
            "height" => "required|min:1|numeric",
            "condition" => "required",
            "details" => "required"
            ], $message);

    	Room::where("id", $request->id)->update([
    		"land_id" => $request->land_id,
    		"name" => $request->name,
    		"length" => $request->length,
    		"width" => $request->width,
    		"height" => $request->height,
    		"condition" => $request->condition,
    		"details" => $request->details
    	]);

    	return redirect()->back()->with("sukses", "Data Berhasil di Update");
    }

    public function hapus_ruangan($id) {
    	Room::where("id", $id)->delete();

    	return redirect()->back()->with("sukses", "Data Berhasil di Delete");
    }
}
