<?php

namespace App\Http\Controllers;

use App\Models\Merk;
use App\Models\Type;
use Illuminate\Http\Request;

class TypeController extends Controller
{
    public function data_type()
    {
        $data["data_merk"] = Merk::get();
    	$data["data_type"] = Type::get();

    	return view("content.type.data_type", $data);
    }

    public function simpan_data_type(Request $req)
    {
        $this->validate($req, [
            "kode_type" => "required",
            "nama_type" => "required",
            "kode_merk" => "required"
        ]);

        $type = new Type;

        $cek_double = $type->where(["kode_type" => $req->kode_type])->count();

        if ($cek_double > 0) {
            return redirect()->back();
        }

    	Type::create($req->all());

    	return redirect()->back();
    }

    public function edit_type(Request $req)
    {
        $data["data_merk"] = Merk::get();
    	$data["edit"] = Type::where("id_type", $req->id_type)->first();

    	return view("content.type.update_data_type", $data);
    }

    public function update_data_type(Request $req)
    {
        $this->validate($req, [
            "kode_type" => "required",
            "nama_type" => "required",
            "kode_merk" => "required"
        ]);

    	Type::where("id_type", $req->id_type)->update([
            "kode_type" => $req->kode_type,
    		"nama_type" => $req->nama_type,
            "kode_merk" => $req->kode_merk
    	]);

    	return redirect()->back();
    }

    public function delete_data_type($id_type)
    {
    	Type::where("id_type", $id_type)->delete();

    	return redirect()->back();
    }
}
