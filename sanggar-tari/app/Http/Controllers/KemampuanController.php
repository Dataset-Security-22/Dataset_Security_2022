<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Kemampuan;

class KemampuanController extends Controller
{
    public function index()
    {
    	$data = [
    		"data_kemampuan" => Kemampuan::orderBy("tingkat_kemampuan", "DESC")->get()
    	];

    	return view("admin/kemampuan/data_kemampuan", $data);
    }

    public function tambah(Request $request)
    {
    	Kemampuan::create($request->all());

    	return redirect()->back();
    }

    public function edit($id_kemampuan)
    {
    	$data = [
    		"edit" => Kemampuan::where("id_kemampuan", $id_kemampuan)->first(),
    		"data_kemampuan" => Kemampuan::where("id_kemampuan", "!=", $id_kemampuan)->get()
    	];

    	return view("admin/kemampuan/edit_data_kemampuan", $data);
    }

    public function simpan(Request $request)
    {
    	Kemampuan::where("id_kemampuan", $request->id_kemampuan)->update([
    		"tingkat_kemampuan" => $request->tingkat_kemampuan
    	]);

    	return redirect("/admin/kemampuan");
    }

    public function hapus(Request $request)
    {
    	Kemampuan::where("id_kemampuan", $request->id_kemampuan)->delete();

    	return redirect()->back();
    }
}
