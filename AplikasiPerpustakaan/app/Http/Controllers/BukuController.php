<?php

namespace App\Http\Controllers;

use App\Models\Buku;
use App\Models\Kategori;
use App\Models\Rak;
use Illuminate\Http\Request;
use File;
use Illuminate\Support\Facades\Auth;

class BukuController extends Controller
{
    public function data_buku()
    {
        $date = date("Y-m-d");
        $data["data_kategori"] = Kategori::orderBy("nama_kategori", "ASC")->get();
        $data["data_rak"] = Rak::orderBy("nama_rak", "ASC")->get();
        $data["data_buku"] = Buku::orderBy("kode", "ASC")->orderBy("judul", "ASC")->get();

        return view("content.page.buku.buku", $data);
    }

    public function post_buku(Request $request)
    {
        $message = [
            "required" => "Kolom :attribute tidak boleh kosong",
            "min" => "Kolom :attribute tidak boleh kurang dari :min digit",
            "max" => "Kolom :attribute tidak boleh lebih dari :max digit",
        ];

        $this->validate($request, [
            "kode" => "required",
            "id_rak" => "required",
            "id_kategori" => "required",
            "img" => "required",
            "judul" => "required",
            "penerbit" => "required",
            "pengarang" => "required",
            "tahun" => "required",
            "stok_buku" => "required|min:1"
        ], $message);

        $save = Buku::create([
            "kode" => $request->kode,
            "id_user" => Auth::user()->id,
            "id_rak" => $request->id_rak,
            "id_kategori" => $request->id_kategori,
            "judul" => $request->judul,
            "penerbit" => $request->penerbit,
            "pengarang" => $request->pengarang,
            "tahun" => $request->tahun,
            "stok_buku" => $request->stok_buku
        ]);

        $file = $request->file("img");
        $fileName = $file->getClientOriginalName();
        $request->file("img")->move("public/picture", $fileName);

        $save->img = $fileName;
        $save->save();

        return redirect()->back()->with("sukses", "Data Berhasil di Inputkan");
    }

    public function edit_buku(Request $request)
    {
        $data["data_kategori"] = Kategori::orderBy("nama_kategori", "ASC")->get();
        $data["data_rak"] = Rak::orderBy("nama_rak", "ASC")->get();
        $data["edit"] = Buku::where("id", $request->id)->first();

        return view("content.page.buku.edit_buku", $data);
    }

    public function put_buku(Request $request)
    {
        $message = [
            "required" => "Kolom :attribute tidak boleh kosong",
            "min" => "Kolom :attribute tidak boleh kurang dari :min digit",
            "max" => "Kolom :attribute tidak boleh lebih dari :max digit",
        ];

        $this->validate($request, [
            "kode" => "required",
            "id_rak" => "required",
            "id_kategori" => "required",
            "judul" => "required",
            "penerbit" => "required",
            "pengarang" => "required",
            "tahun" => "required",
            "stok_buku" => "required|min:1"
        ], $message);

        $update = Buku::where("id", $request->id)->first();

        $update->id_rak = $request->id_rak;
        $update->id_kategori = $request->id_kategori;
        $update->penerbit = $request->penerbit;
        $update->pengarang = $request->pengarang;
        $update->tahun = $request->tahun;
        $update->stok_buku = $request->stok_buku;

        if ($request->file("img") == "") {
            $update->img = $update->img;
        } else {
            File::delete("public/picture/" . $update->img);

            $file = $request->file("img");
            $fileName = $file->getClientOriginalName();
            $request->file("img")->move("public/picture", $fileName);
            $update->img = $fileName;
        }

        $update->update();

        return redirect()->back()->with("sukses", "Data Berhasil di Simpan");
    }

    public function hapus_buku($id)
    {
        $delete = Buku::where("id", $id)->first();
        File::delete("public/picture/" . $delete->img);

        Buku::where("id", $id)->delete();

        return redirect()->back()->with("sukses", "Data Berhasil di Hapus");
    }
}
