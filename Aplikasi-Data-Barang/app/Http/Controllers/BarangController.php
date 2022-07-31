<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Good;
use App\Models\Stock;
use Illuminate\Http\Request;
use File;

class BarangController extends Controller
{
    public function barang() {
		$data["data_kategori"] = Category::get();
		$data["data_barang"] = Good::get();

		return view("content.admin.barang.data_barang", $data);
	}

	public function tambah_barang(Request $request) {
		$good = new Good;

        $cek = $good->where(["name" => $request->name])->count();

        if ($cek > 0) {
            return redirect()->back()->with("error", "Data Barang ".$request->name." Sudah Ada");
        }

        $message = [
        	"unique" => "Nama :attribute tersebut sudah ada",
        	"required" => "Kolom :attribute tidak boleh kosong",
        	"min" => "Kolom :attribute harus diisi minimal :min digit",
        	"max" => "Kolom :attribute tidak boleh lebih dari :max digit"
        ];

        $this->validate($request, [
        	"category_id" => "required|min:1",
        	"image" => "required",
            "name" => "required",
            "details" => "required"
        ], $message);

		$save = Good::create($request->all());

		$file = $request->file("image");
		$fileName = $file->getClientOriginalName();
		$request->file("image")->move("public/goods", $fileName);

		$save->image = $fileName;
		$save->save();

		return redirect()->back()->with("sukses", "Data Berhasil di Inputkan");
	}

	public function ajax_edit_barang(Request $request) {
		$data["data_kategori"] = Category::get();
		$data["edit"] = Good::where("id", $request->id)->first();

		return view("content.admin.barang.edit_barang", $data);
	}

	public function update_barang(Request $request) {
		$message = [
        	"unique" => "Nama :attribute tersebut sudah ada",
        	"required" => "Kolom :attribute tidak boleh kosong",
        	"min" => "Kolom :attribute harus diisi minimal :min digit",
        	"max" => "Kolom :attribute tidak boleh lebih dari :max digit"
        ];

        $this->validate($request, [
        	"category_id" => "required|min:1",
            "name" => "required",
            "details" => "required"
        ], $message);

		$update = Good::where("id", $request->id)->first();

		$update->category_id = $request->category_id;
		$update->name = $request->name;
		$update->details = $request->details;

		if ($request->file("image") == "")
		{
			$update->image = $update->image;
		} else {
			File::delete("public/goods/".$update->image);

			$file = $request->file("image");
			$fileName = $file->getClientOriginalName();
			$request->file("image")->move("public/goods",$fileName);
			$update->image = $fileName;
		}

		$update->update();

		return redirect()->back()->with("sukses", "Data Berhasil di Update");
	}

	public function hapus_barang($id) {
		$delete = Good::where("id", $id)->first();
		File::delete("public/goods".$delete->image);

		Good::where("id", $id)->delete();

		return redirect()->back()->with("sukses", "Data Berhasil di Delete");
	}

	public function tambah_stok(Request $request) {
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

		Stock::create([
			"good_id" => $request->good_id,
			"type" => $request->type,
			"date" => date("Y-m-d"),
			"quantity" => $request->quantity,
			"details" => $request->details
		]);

		return redirect()->back()->with("sukses", "Data Berhasil di Inputkan");

	}
}
