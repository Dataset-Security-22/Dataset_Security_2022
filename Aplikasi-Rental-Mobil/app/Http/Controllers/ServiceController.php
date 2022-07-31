<?php

namespace App\Http\Controllers;

use App\Models\JenisService;
use App\Models\Service;
use Illuminate\Http\Request;

class ServiceController extends Controller
{
    public function data_service()
    {
    	$data["data_jenis_service"] = JenisService::get();
    	$data["data_service"] = Service::get();

    	return view("content.service.data_service", $data);
    }

    public function simpan_data_service(Request $req)
    {
    	Service::create($req->all());

    	return redirect()->back();
    }

    public function edit_service(Request $req)
    {
        $data["data_jenis_service"] = JenisService::get();
        $data["edit"] = Service::where("id_service", $req->id_service)->first();

        return view("content.service.update_data_service", $data);
    }

    public function update_service(Request $req)
    {
        Service::where("id_service", $req->id_service)->update([
            "kode_service" => $req->kode_service,
            "tgl_service" => $req->tgl_service,
            "biaya_service" => $req->biaya_service,
            "id_jenis_service" => $req->id_jenis_service
        ]);

        return redirect()->back();
    }

    public function delete_data_service($id_service)
    {
        Service::where("id_service", $id_service)->delete();

        return redirect()->back();
    }
}
