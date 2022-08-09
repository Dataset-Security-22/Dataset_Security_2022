<?php

namespace App\Http\Controllers;

use App\Models\Petugas;
use App\Models\User;
use Illuminate\Http\Request;

class PetugasController extends Controller
{
    public function data_petugas()
    {
        $data["data_petugas"] = Petugas::orderBy("nik_petugas", "ASC")->get();

        return view("content.petugas.petugas", $data);
    }

    public function post_petugas(Request $req)
    {
        $message = [
            "required" => "Kolom :attribute tidak boleh kosong"
        ];

        $this->validate($req, [
            "nik_petugas" => "required",
            "nama" => "required",
            "alamat" => "required",
            "no_telepon" => "required",
            "jk" => "required"
        ], $message);

        $petugas =  new Petugas;

        $cek_double = $petugas->where("nik_petugas", $req->nik_petugas)->count();

        if ($cek_double > 0) {
            return redirect()->back()->with("error", "NIK " . $req->nik_petugas . " Sudah Ada");
        }

        Petugas::create($req->all());

        User::create([
            "nama" => $req->nama,
            "alamat" => $req->alamat,
            "no_telepon" => $req->no_telepon,
            "saldo" => 0,
            "biaya_admin" => 2000,
            "username" => $req->nik_petugas,
            "password" => bcrypt($req->nik_petugas . "-petugas"),
            "role" => 2
        ]);

        return redirect()->back()->with("sukses", "Data Berhasil di Inputkan");
    }

    public function edit_petugas(Request $req)
    {
        $data["edit"] = Petugas::where("nik_petugas", $req->nik_petugas)->first();

        return view("content.petugas.edit_petugas", $data);
    }

    public function put_petugas(Request $req)
    {
        $message = [
            "required" => "Kolom :attribute tidak boleh kosong"
        ];

        $this->validate($req, [
            "nik_petugas" => "required",
            "nama" => "required",
            "alamat" => "required",
            "no_telepon" => "required",
            "jk" => "required"
        ], $message);

        Petugas::where("nik_petugas", $req->nik_petugas)->update([
            "nama" => $req->nama,
            "alamat" => $req->alamat,
            "no_telepon" => $req->no_telepon,
            "jk" => $req->jk
        ]);

        User::where("username", $req->nik_petugas)->update([
            "nama" => $req->nama,
        ]);

        return redirect()->back()->with("sukses", "Data Berhasil di Ubah");
    }

    public function hapus_petugas($nik_petugas)
    {
        Petugas::where("nik_petugas", $nik_petugas)->delete();

        User::where("username", $nik_petugas)->delete();

        return redirect()->back()->with("sukses", "Data Berhasil di Hapus");
    }
}
