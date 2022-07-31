<?php

namespace App\Http\Controllers;

use App\Models\Land;
use Illuminate\Http\Request;

class TanahController extends Controller
{
    public function tanah() {
		$data["data_tanah"] = Land::get();

		return view("content.admin.tanah.data_tanah", $data);
	}

    public function tambah_tanah(Request $request) {
        $tanah = new Land;

        $cek = $tanah->where(["name" => $request->name])->count();

        if ($cek > 0) {
            return redirect()->back()->with("error", "Data Tanah ".$request->name." Sudah Ada");
        }

        $message = [
            "numeric" => "Kolom :attribute harus angka",
            "min" => "Kolom :attribute harus :min digit",
            "required" => "Kolom :attribute tidak boleh kosong",
        ];

        $this->validate($request, [
            "name" => "required",
            "length" => "required|min:1|numeric",
            "width" => "required|min:1|numeric",
            "details" => "required"
        ],$message);

    	Land::create($request->all());

    	return redirect()->back()->with("sukses", "Data Berhasil di Inputkan");
    }

    public function edit_tanah($id) {
        $data["data_tanah"] = Land::where("id", "!=", $id)->get();
    	$data["edit"] = Land::where("id", $id)->first();

        if (!$data["edit"]) {
            return redirect()->back()->with("error", "Data tidak ada");
        }

    	return view("content.admin.tanah.edit_tanah", $data);
    }

    public function update_tanah(Request $request) {

        $message = [
            "numeric" => "Kolom :attribute harus angka",
            "min" => "Kolom :attribute harus :min digit",
            "required" => "Kolom :attribute tidak boleh kosong",
        ];

        $this->validate($request, [
            "name" => "required",
            "length" => "required|min:1|numeric",
            "width" => "required|min:1|numeric",
            "details" => "required"
        ],$message);

    	Land::where("id", $request->id)->update([
    		"name" => $request->name,
    		"length" => $request->length,
    		"width" => $request->width,
    		"details" => $request->details
    	]);

    	return redirect()->back()->with("sukses", "Data Berhasil di Update");
    }

    public function hapus_tanah($id) {
    	Land::where("id", $id)->delete();

    	return redirect()->back()->with("sukses", "Data Berhasil di Delete");
    }
}
