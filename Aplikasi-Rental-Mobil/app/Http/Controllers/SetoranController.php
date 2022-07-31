<?php

namespace App\Http\Controllers;

use App\Models\Setoran;
use App\Models\Sopir;
use Illuminate\Http\Request;

class SetoranController extends Controller
{
    public function data_setoran()
    {
    	$data["data_sopir"] = Sopir::get();
    	$data["data_setoran"] = Setoran::get();

    	return view("content.setoran.data_setoran", $data);
    }

    public function simpan_data_setoran(Request $req)
    {
    	$this->validate($req, [
    		"no_setoran" => "required",
    		"tgl_setoran" => "required",
    		"jumlah" => "required",
    		"id_sopir" => "required"
    	]);

    	$setoran = new Setoran;

    	$cek_double = $setoran->where(["no_setoran" => $req->no_setoran])->count();

    	if ($cek_double > 0) {
    		return redirect()->back();
    	}

    	Setoran::create($req->all());

    	return redirect()->back();
    }

    public function edit_setoran(Request $req)
    {
    	$data["data_sopir"] = Sopir::get();
    	$data["edit"] = Setoran::where("id_setoran", $req->id_setoran)->first();

    	return view("content.setoran.update_data_setoran", $data);
    }

    public function update_data_setoran(Request $req)
    {
    	$this->validate($req, [
    		"jumlah" => "required",
    		"id_sopir" => "required"
    	]);

    	Setoran::where("id_setoran", $req->id_setoran)->update([
    		"jumlah" => $req->jumlah,
    		"id_sopir" => $req->id_sopir
    	]);

    	return redirect()->back();
    }

    public function delete_data_setoran($id_setoran)
    {
    	Setoran::where("id_setoran", $id_setoran)->delete();

    	return redirect()->back();
    }
}
