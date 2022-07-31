<?php

namespace App\Http\Controllers;

use App\Models\Employe;
use Illuminate\Http\Request;

class KaryawanController extends Controller
{
    public function karyawan() {
    	$data["data_karyawan"] = Employe::get();

    	return view("content.admin.karyawan.data_karyawan", $data);
    }

    public function tambah_karyawan(Request $request) {

        $message = [
        "unique" => "Nama :attribute tersebut sudah ada",
        "required" => "Kolom :attribute tidak boleh kosong",
        "min" => "Kolom :attribute harus diisi minimal :min digit",
        "max" => "Kolom :attribute tidak boleh lebih dari :max digit",
        "numeric" => "Kolom :attribute harus angka"
        ];

        $this->validate($request, [
            "name" => "required",
            "phone" => "required|min:5|numeric",
            "address" => "required"
            ], $message);

    	Employe::create($request->all());

    	return redirect()->back()->with("sukses", "Data Berhasil di Inputkan");
    }

    public function edit_karyawan($id) {
        $data["data_karyawan"] = Employe::where("id", "!=", $id)->get();
        $data["edit"] = Employe::where("id", $id)->first();

        if (!$data["edit"]) {
            return redirect()->back()->with("error", "Data tidak ada");
        }

    	return view("content.admin.karyawan.edit_karyawan", $data);
    }

    public function update_karyawan(Request $request) {

        $message = [
        "unique" => "Nama :attribute tersebut sudah ada",
        "required" => "Kolom :attribute tidak boleh kosong",
        "min" => "Kolom :attribute harus diisi minimal :min digit",
        "max" => "Kolom :attribute tidak boleh lebih dari :max digit",
        "numeric" => "Kolom :attribute harus angka"
        ];

        $this->validate($request, [
            "name" => "required",
            "phone" => "required|min:5|numeric",
            "address" => "required"
            ], $message);

    	Employe::where("id", $request->id)->update([
    		"name" => $request->name,
    		"phone" => $request->phone,
    		"address" => $request->address
    	]);

    	return redirect()->back()->with("sukses", "Data berhasil di update");
    }

    public function delete_employee($id) {
    	Employe::where("id", $id)->delete();

    	return redirect()->back()->with("sukses", "Data Berhasil di Delete");
    }
}
