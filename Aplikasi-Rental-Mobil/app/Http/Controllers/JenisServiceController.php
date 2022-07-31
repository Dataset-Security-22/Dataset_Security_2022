<?php

namespace App\Http\Controllers;

use App\Models\JenisService;
use Illuminate\Http\Request;

class JenisServiceController extends Controller
{
    public function jenis_service()
    {
    	$data["data_jenis_service"] = JenisService::get();

    	return view("content.jenis_service.data_jenis_service", $data);
    }

    public function simpan_data_jenis_service(Request $req)
    {
        $this->validate($req, [
            "nama_jenis_service" => "required"
        ]);

    	JenisService::create($req->all());

    	return redirect()->back();
    }

    public function edit_jenis_service(Request $req)
    {
    	$data["edit"] = JenisService::where("id_jenis_service", $req->id_jenis_service)->first();

    	return view("content.jenis_service.update_data_jenis_service", $data);
    }

    public function update_data_jenis_service(Request $req)
    {
        $this->validate($req, [
            "nama_jenis_service" => "required"
        ]);

    	JenisService::where("id_jenis_service", $req->id_jenis_service)->update([
    		"nama_jenis_service" => $req->nama_jenis_service
    	]);

    	return redirect()->back();
    }

    public function delete_jenis_service($id_jenis_service)
    {
    	JenisService::where("id_jenis_service", $id_jenis_service)->delete();

    	return redirect()->back();
    }
}
