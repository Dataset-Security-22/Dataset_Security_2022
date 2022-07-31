<?php

namespace App\Http\Controllers;

use App\Models\Attribute;
use App\Models\Good;
use Illuminate\Http\Request;

class AttributeController extends Controller
{
    public function attribute() {
        $data["data_barang"] = Good::get();
        $data["data_attribute"] = Attribute::get();

        return view("content.admin.attribute.data_attribute", $data);
    }

    public function tambah_attribute(Request $request) {
        $message = [
            "unique" => "Nama :attribute tersebut sudah ada",
            "required" => "Kolom :attribute tidak boleh kosong",
            "min" => "Kolom :attribute harus diisi minimal :min digit",
            "max" => "Kolom :attribute tidak boleh lebih dari :max digit"
        ];

        $this->validate($request, [
            "good_id" => "required|min:1",
            "key" => "required",
            "value" => "required"
        ], $message);

        Attribute::create($request->all());

        return redirect()->back()->with("sukses", "Data Berhasil di Inputkan");
    }

    public function edit_attribute($id) {
        $data["data_barang"] = Good::get();
        $data["data_attribute"] = Attribute::where("id", "!=", $id)->get();
        $data["edit"] = Attribute::where("id", $id)->first();

        if (!$data["edit"]) {
            return redirect()->back()->with("error", "Data tidak ada");
        }

        return view("content.admin.attribute.edit_attribute", $data);
    }

    public function update_attribute(Request $request) {
        $message = [
            "unique" => "Nama :attribute tersebut sudah ada",
            "required" => "Kolom :attribute tidak boleh kosong",
            "min" => "Kolom :attribute harus diisi minimal :min digit",
            "max" => "Kolom :attribute tidak boleh lebih dari :max digit"
        ];

        $this->validate($request, [
            "good_id" => "required|min:1",
            "key" => "required",
            "value" => "required"
        ], $message);

        Attribute::where("id", $request->id)->update([
            "good_id" => $request->good_id,
            "key" => $request->key,
            "value" => $request->value
        ]);

        return redirect()->back()->with("sukses", "Data berhasil di update");
    }

    public function hapus_attribute($id) {
        Attribute::where("id", $id)->delete();

        return redirect()->back()->with("sukses", "Data berhasil di delete");
    }
}
