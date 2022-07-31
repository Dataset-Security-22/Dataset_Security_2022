<?php

namespace App\Http\Controllers;

use App\Models\Petugas;
use App\Models\User;
use Illuminate\Http\Request;

class PetugasController extends Controller
{
    public function data_petugas()
    {
    	$data["data_petugas"] = Petugas::get();

    	return view("content.petugas.data_petugas", $data);
    }

    public function simpan_data_petugas(Request $req)
    {
        $this->validate($req, [
            "nik" => "required",
            "nama_kar" => "required",
            "telp_kar" => "required",
            "jenis_kelamin" => "required",
            "alamat_kar" => "required"
        ]);

    	Petugas::create($req->all());

        User::create([
            "username" => $req->nik,
            "password" => bcrypt("petugas".$req->nik),
            "role" => 2,
            "active" => 1
        ]);

    	return redirect()->back();
    }

    public function edit_petugas(Request $req)
    {
    	$data["edit"] = Petugas::where("nik", $req->nik)->first();

    	return view("content.petugas.update_data_petugas", $data);
    }

    public function update_data_petugas(Request $req)
    {
        $this->validate($req, [
            "nik" => "required",
            "nama_kar" => "required",
            "telp_kar" => "required",
            "jenis_kelamin" => "required",
            "alamat_kar" => "required"
        ]);

    	Petugas::where("nik", $req->nik)->update([
    		"nama_kar" => $req->nama_kar,
    		"alamat_kar" => $req->alamat_kar,
    		"telp_kar" => $req->telp_kar
    	]);

        User::where("username", $req->nik_lama)->update([
            "username" => $req->nik,
            "password" => bcrypt("petugas".$req->nik)
        ]);

    	return redirect()->back();
    }

    public function delete_data_petugas($nik)
    {
    	Petugas::where("nik", $nik)->delete();

        User::where("username", $nik)->delete();

    	return redirect()->back();
    }
}
