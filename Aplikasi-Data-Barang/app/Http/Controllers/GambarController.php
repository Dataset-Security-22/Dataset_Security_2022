<?php

namespace App\Http\Controllers;

use App\Models\Image;
use Illuminate\Http\Request;
use File;

class GambarController extends Controller
{
    public function gambar()
    {
        $data["data_gambar"] = Image::get();

        return view("content.admin.gambar.data_gambar", $data);
    }

    public function tambah_gambar(Request $request)
    {
        $message = [
        "unique" => "Nama :attribute tersebut sudah ada",
        "required" => "Kolom :attribute tidak boleh kosong",
        "min" => "Kolom :attribute harus diisi minimal :min digit",
        "max" => "Kolom :attribute tidak boleh lebih dari :max digit"
        ];

        $this->validate($request, [
            "image" => "required",
            "label" => "required",
            "details" => "required"
            ], $message);

        $save = Image::create($request->all());
        $file = $request->file("image");
        $fileName = $file->getClientOriginalName();
        $request->file("image")->move("public/images", $fileName);

        $save->image = $fileName;
        $save->save();

        return redirect()->back()->with("sukses", "Data berhasil di input");

    }

    public function edit_gambar($id) {
        $data["data_gambar"] = Image::where("id", "!=", $id)->get();
        $data["edit"] = Image::where("id", $id)->first();

        if (!$data["edit"]) {
            return redirect()->back()->with("error", "Data tidak ada");
        }

    	return view("content.admin.gambar.edit_gambar", $data);
    }

    public function update_gambar(Request $request) {
        $message = [
            "unique" => "Nama :attribute tersebut sudah ada",
            "required" => "Kolom :attribute tidak boleh kosong",
            "min" => "Kolom :attribute harus diisi minimal :min digit",
            "max" => "Kolom :attribute tidak boleh lebih dari :max digit"
        ];

        $this->validate($request, [
            "label" => "required",
            "details" => "required"
        ], $message);

        $update = Image::where("id", $request->id)->first();

        $update->label = $request->label;
        $update->details = $request->details;

        if ($request->file("image") == "")
        {
            $update->image = $update->image;
        } else {
            File::delete("public/images/".$update->image);

            $file = $request->file("image");
            $fileName = $file->getClientOriginalName();
            $request->file("image")->move("public/images",$fileName);
            $update->image = $fileName;
        }

        $update->update();

        return redirect()->back()->with("sukses", "Data berhasil di update");
    }

    public function hapus_gambar($id) {
        $delete = Image::where("id", $id)->first();
        File::delete("public/images".$delete->image);

        Image::where("id", $id)->delete();

        return redirect()->back()->with("sukses", "Data Berhasil di Delete");
    }

    public function gambar_lapangan() {
        $data["data_ruangan"] = Room::get();
        $data["data_lapangan"] = Field::get();
        $data["data_gambar"] = Image::get();

        return view("content.admin.gambar.data_gambar_lapangan", $data);
    }

    public function tambah_gambar_lapangan(Request $request) {
        $message = [
        "unique" => "Nama :attribute tersebut sudah ada",
        "required" => "Kolom :attribute tidak boleh kosong",
        "min" => "Kolom :attribute harus diisi minimal :min digit",
        "max" => "Kolom :attribute tidak boleh lebih dari :max digit"
        ];

        $this->validate($request, [
            "image" => "required",
            "label" => "required",
            "details" => "required"
            ], $message);

        $save = Image::create($request->all());
        $file = $request->file("image");
        $fileName = $file->getClientOriginalName();
        $request->file("image")->move("public/images", $fileName);

        $save->image = $fileName;
        $save->save();

        return redirect()->back()->with("sukses", "Data berhasil di input");
    }

    public function edit_gambar_lapangan($id) {
        $data["data_ruangan"] = Room::get();
        $data["data_lapangan"] = Field::get();
        $data["data_gambar"] = Image::where("id", "!=", $id)->get();
        $data["edit"] = Image::where("id", $id)->first();

        if (!$data["edit"]) {
            return redirect()->back()->with("error", "Data tidak ada");
        }

        return view("content.admin.gambar.edit_gambar_lapangan", $data);
    }

    public function update_gambar_lapangan(Request $request) {
        $message = [
            "unique" => "Nama :attribute tersebut sudah ada",
            "required" => "Kolom :attribute tidak boleh kosong",
            "min" => "Kolom :attribute harus diisi minimal :min digit",
            "max" => "Kolom :attribute tidak boleh lebih dari :max digit"
        ];

        $this->validate($request, [
            "field_id" => "required",
            "label" => "required",
            "details" => "required"
        ], $message);

        $update = Image::where("id", $request->id)->first();

        $update->field_id = $request->field_id;
        $update->label = $request->label;
        $update->details = $request->details;

        if ($request->file("image") == "")
        {
            $update->image = $update->image;
        } else {
            File::delete("public/images/".$update->image);

            $file = $request->file("image");
            $fileName = $file->getClientOriginalName();
            $request->file("image")->move("public/images",$fileName);
            $update->image = $fileName;
        }

        $update->update();

        return redirect()->back()->with("sukses", "Data berhasil di update");
    }
}
