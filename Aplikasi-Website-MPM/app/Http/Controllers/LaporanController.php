<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Model\Divisi;
use App\Models\Model\Absensi;

class LaporanController extends Controller
{
    public function laporan_data_absen()
    {
    	$data = [
    		"data_divisi" => Divisi::all()
    	];

    	return view("/page/admin/laporan/data_absen", $data);
    }

    public function detail_laporan_absen($id_divisi)
    {
        $data = [
            "detail" => Divisi::where("id_divisi", $id_divisi)->first()
        ];

        return view("/page/admin/laporan/detail_laporan_absen", $data);
    }

    public function laporan_data_kas()
    {
        $data = [
            "data_divisi" => Divisi::all()
        ];

    	return view("/page/admin/laporan/data_kas", $data);
    }

    public function detail_laporan_kas($id_divisi)
    {
        $data = [
            "detail" => Divisi::where("id_divisi", $id_divisi)->first()
        ];

        return view("/page/admin/laporan/detail_laporan_kas", $data);
    }
}
