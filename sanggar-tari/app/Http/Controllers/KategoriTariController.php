<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\KategoriTari;

class KategoriTariController extends Controller
{
    public function index()
    {
        $data = [
            "data_kategori_tari" => KategoriTari::orderBy("nama_kategori_tari", "ASC")->get()
        ];

        return view("/admin/kategori_tari/data_kategori", $data);
    }

    public function tambah(Request $request)
    {
        KategoriTari::create($request->all());

        return redirect()->back();
    }

    public function hapus(Request $request)
    {
        KategoriTari::where("id", $request->id)->delete();

        return redirect()->back();
    }

    public function edit($id)
    {
        $data = [
            "edit" => KategoriTari::where("id", $id)->first(),
            "data_kategori_tari" => KategoriTari::where("id", "!=", $id)->orderBy("nama_kategori_tari", "ASC")->get()
        ];

        return view("/admin/kategori_tari/edit_kategori_tari", $data);
    }

    public function simpan(Request $request)
    {
        KategoriTari::where("id", $request->id)->update([
            "nama_kategori_tari" => $request->nama_kategori_tari
        ]);

        return redirect("/admin/kategori_tari");
    }
}
