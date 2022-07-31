<?php

namespace App\Http\Controllers;

use App\Models\Kategori;
use Illuminate\Http\Request;

class KategoriController extends Controller
{
    public function data_kategori()
    {
        $data["data_kategori"] = Kategori::get();

        return view("content.kategori.data_kategori", $data);
    }

    public function simpan_data_kategori(Request $req)
    {
        Kategori::create($req->all());

        return redirect()->back();
    }

    public function edit_kategori($id)
    {
        $data["data_kategori"] = Kategori::where("id", "!=", $id)->get();
        $data["edit"] = Kategori::where("id", $id)->first();

        if (!$data["edit"]) {
            return redirect()->back();
        }

        return view("content.kategori.update_kategori", $data);
    }

    public function update_kategori(Request $req)
    {
        Kategori::where("id", $req->id)->update([
            "nama_kategori" => $req->nama_kategori
        ]);

        return redirect()->back();
    }
}
