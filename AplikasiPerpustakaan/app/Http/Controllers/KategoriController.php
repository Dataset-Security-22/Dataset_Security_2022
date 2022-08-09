<?php

namespace App\Http\Controllers;

use App\Models\Kategori;
use Illuminate\Http\Request;

class KategoriController extends Controller
{
    public function data_kategori()
    {
        $data["data_kategori"] = Kategori::orderBy("nama_kategori", "ASC")->get();

        return view("content.page.kategori.kategori", $data);
    }

    public function post_kategori(Request $request)
    {
        $message = [
            "required" => "Kolom :attribute tidak boleh kosong"
        ];

        $this->validate($request, [
            "nama_kategori" => "required"
        ], $message);

        $kategori = new Kategori;

        $cek_double = $kategori->where(["nama_kategori" => $request->nama_kategori])->count();

        if ($cek_double > 0) {
            return redirect()->back()->with("error", "Data " . $request->nama_kategori . " Sudah Ada");
        }

        Kategori::create($request->all());

        return redirect()->back()->with("sukses", "Data Berhasil di Inputkan");
    }

    public function edit_kategori($id)
    {
        $data["data_kategori"] = Kategori::where("id", "!=", $id)->orderBy("nama_kategori", "ASC")->get();
        $data["edit"] = Kategori::where("id", $id)->first();

        if (!$data["edit"]) {
            return redirect()->back()->with("error", "Data Tidak Ada");
        }

        return view("content.page.kategori.edit_kategori", $data);
    }

    public function put_kategori(Request $request)
    {
        $message = [
            "required" => "Kolom :attribute tidak boleh kosong"
        ];

        $this->validate($request, [
            "nama_kategori" => "required"
        ], $message);

        $kategori = new Kategori;

        $data = Kategori::where("nama_kategori", $request->nama_lama)->get();

        $cek_double = $kategori->where(["nama_kategori" => $request->nama_kategori])->get();
        $cek = $kategori->where(["nama_kategori" => $request->nama_kategori])->count();

        if ($data == $cek_double) {
            return redirect()->back()->with("warning", "Tidak ada data yang di ubah");
        } else if ($cek_double != $data) {
            if ($cek > 0) {
                return redirect()->back()->with("error", "Data " . $request->nama_kategori . " Sudah Ada");
            } else {
                Kategori::where("id", $request->id)->update([
                    "nama_kategori" => $request->nama_kategori
                ]);

                return redirect()->back()->with("sukses", "Data Berhasil di Simpan");
            }
        }
    }

    public function hapus_kategori($id)
    {
        Kategori::where("id", $id)->delete();

        return redirect()->back()->with("sukses", "Data Berhasil di Hapus");
    }
}
