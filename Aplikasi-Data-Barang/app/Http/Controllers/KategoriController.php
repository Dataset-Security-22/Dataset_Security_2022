<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;

class KategoriController extends Controller
{
    public function kategori() {
    	$data["data_kategori"] = Category::get();

    	return view("content.admin.kategori.data_kategori", $data);
    }

    public function tambah_kategori(Request $request) {
        $category = new Category;

        $cek = $category->where(["name" => $request->name])->count();

        if ($cek > 0) {
            $data["name"] = $request->name;
            return redirect()->back()->with("error", "Data Kategori ".$request->name." Sudah Ada");
        }

        $message = [
        "unique" => "Nama :attribute tersebut sudah ada",
        "required" => "Kolom :attribute tidak boleh kosong",
        "min" => "Kolom :attribute harus diisi minimal :min digit",
        "max" => "Kolom :attribute tidak boleh lebih dari :max digit"
        ];

        $this->validate($request, [
            "name" => "required|min:1|unique:categories"
            ], $message);

        Category::create($request->all());

        return redirect()->back()->with("sukses", "Data berhasil di tambah");
    }

    public function update_kategori(Request $request) {
        $message = [
        "unique" => "Data :attribute tersebut sudah ada",
        "required" => "Kolom :attribute tidak boleh kosong",
        "min" => "Kolom :attribute harus diisi minimal :min digit",
        "max" => "Kolom :attribute tidak boleh lebih dari :max digit"
        ];

        $this->validate($request, [
            "name" => "required|min:1|unique:categories"
            ], $message);

        Category::where("id", $request->id)->update([
          "name" => $request->name
          ]);

        return redirect()->back()->with("sukses", "Data berhasil di update");
    }

    public function hapus_kategori($id) {
    	Category::where("id", $id)->delete();

    	return redirect()->back()->with("sukses", "Data berhasil di hapus");
    }

    public function edit_kategori($id) {
        $data["data_kategori"] = Category::where("id", "!=", $id)->get();
        $data["edit"] = Category::where("id", $id)->first();

        if (!$data["edit"]) {
            return redirect()->back()->with("error", "Data tidak ada");
        }

        return view("content.admin.kategori.edit_kategori", $data);
    }
}
