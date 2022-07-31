<?php

namespace App\Http\Controllers;

use App\Models\Petugas;
use App\Models\User;
use Illuminate\Http\Request;

class HakAksesController extends Controller
{
    public function hak_akses()
    {
        $data["data_petugas"] = Petugas::get();
        $data["data_hak_akses"] = User::where("role", 2)->get();

        return view("content.hak_akses.data_hak_akses", $data);
    }

    public function simpan_data_hak_akses(Request $req)
    {
        User::create([
            "nama" => $req->nama,
            "alamat" => $req->alamat,
            "no_telepon" => $req->no_telepon,
            "biaya_admin" => $req->biaya_admin,
            "username" => $req->username,
            "password" => bcrypt($req->password)
        ]);

        return redirect()->back();
    }
}
