<?php

namespace App\Http\Controllers;

use App\Models\Pelanggan;
use Illuminate\Http\Request;

class PelangganController extends Controller
{
    public function data_pelanggan()
    {
    	$data["data_pelanggan"] = Pelanggan::get();

    	return view("content.pelanggan.data_pelanggan", $data);
    }

    public function edit_pelanggan(Request $req)
    {
    	$data["edit"] = Pelanggan::where("id", $req->id)->first();

    	return view("content.pelanggan.edit_pelanggan", $data);
    }

    public function update_data_pelanggan(Request $req)
    {
    	$this->validate($req, [
    		"nama_pel" => "required",
    		"alamat_pel" => "required",
    		"telp_pel" => "required"
    	]);

    	Pelanggan::where("id", $req->id)->update([
    		"nama_pel" => $req->nama_pel,
    		"alamat_pel" => $req->alamat_pel,
    		"telp_pel" => $req->telp_pel
    	]);

    	return redirect()->back();
    }
}
