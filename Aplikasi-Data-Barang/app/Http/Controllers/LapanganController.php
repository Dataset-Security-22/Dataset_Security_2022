<?php

namespace App\Http\Controllers;

use App\Models\Field;
use App\Models\Land;
use Illuminate\Http\Request;

class LapanganController extends Controller
{
    public function lapangan() {
    	$data["data_tanah"] = Land::get();
    	$data["data_lapangan"] = Field::get();

    	return view("content.admin.lapangan.data_lapangan", $data);
    }

    public function tambah_lapangan(Request $request) {
        $lapangan = new Field;

        $cek = $lapangan->where(["name" => $request->name])->count();

        if ($cek > 0) {
            return redirect()->back()->with("error", "Data Lapangan ".$request->name." Sudah Ada");
        }

        $message = [
            "required" => "Kolom :attribute tidak boleh kosong",
            "numeric" => "Kolom :attribute harus angka",
            "min" => "Kolom :attribute harus diisi minimal :min digit"
        ];

        $this->validate($request, [
            "land_id" => "required|numeric",
            "name" => "required",
            "length" => "required|numeric|min:1",
            "width" => "required|numeric|min:1",
            "condition" => "required|min:1|numeric",
            "details" => "required"
        ], $message);

    	Field::create($request->all());

    	return redirect()->back()->with("sukses", "Data Berhasil di Inputkan");
    }

    public function ajax_edit_lapangan(Request $request) {
    	$data["data_lands"] = Land::get();
    	$data["edit"] = Field::where("id", $request->id)->first();

    	return view("content.admin.lapangan.edit_lapangan", $data);
    }

    public function update_lapangan(Request $request) {

        $message = [
            "required" => "Kolom :attribute tidak boleh kosong",
            "numeric" => "Kolom :attribute harus angka",
            "min" => "Kolom :attribute harus diisi minimal :min digit"
        ];

        $this->validate($request, [
            "land_id" => "required|numeric",
            "name" => "required",
            "length" => "required|numeric|min:1",
            "width" => "required|numeric|min:1",
            "condition" => "required|min:1|numeric",
            "details" => "required"
        ], $message);

    	Field::where("id", $request->id)->update([
    		"land_id" => $request->land_id,
    		"name" => $request->name,
    		"length" => $request->length,
    		"width" => $request->width,
    		"condition" => $request->condition,
    		"details" => $request->details
    	]);

    	return redirect()->back()->with("sukses", "Data Berhasil di Update");
    }

    public function hapus_lapangan($id) {
        Field::where("id", $id)->delete();

        return redirect()->back()->with("sukses", "Data berhasil di hapus");
    }
}
