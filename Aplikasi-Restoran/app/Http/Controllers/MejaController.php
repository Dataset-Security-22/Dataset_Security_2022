<?php

namespace App\Http\Controllers;

use App\Models\Meja;
use Illuminate\Http\Request;

class MejaController extends Controller
{
    public function data_meja()
    {
        $data["data_meja"] = Meja::get();

        return view("content.meja.data_meja", $data);
    }

    public function simpan_data_meja(Request $req)
    {
        Meja::create($req->all());

        return redirect()->back();
    }

    public function edit_meja($id)
    {
        $data["data_meja"] = Meja::where("id", "!=", $id)->get();
        $data["edit"] = Meja::where("id", $id)->first();

        if (!$data["edit"]) {
            return redirect()->back();
        }

        return view("content.meja.update_meja", $data);
    }

    public function update_meja(Request $req)
    {
        Meja::where("id", $req->id)->update([
            "kode_meja" => $req->kode_meja,
            "status_meja" => $req->status_meja
        ]);

        return redirect()->back();
    }
}
