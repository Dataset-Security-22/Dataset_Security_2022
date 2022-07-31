<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Model\Angkatan;

class AngkatanController extends Controller
{
	public function index()
	{
		$data = [
			"data_angkatan" => Angkatan::orderBy("tahun_angkatan", "DESC")->get()
		];

		return view("/page/admin/angkatan/data_angkatan", $data);
	}

	public function tambah(Request $request)
	{
		Angkatan::create($request->all());

		return redirect()->back()->with("sukses", "Data Berhasil di Tambahkan");
	}

	public function hapus($id_angkatan)
    {
    	Angkatan::where("id_angkatan", $id_angkatan)->delete();

    	return redirect()->back()->with("sukses", "Data Berhasil di Hapus");
    }

    public function edit($id_angkatan)
    {
    	$data = [
    		"edit" => Angkatan::where("id_angkatan", $id_angkatan)->first(),
    		"data_angkatan" => Angkatan::where("id_angkatan", "!=" , $id_angkatan)->orderBy("tahun_angkatan", "DESC")->get()
    	];

    	return view("/page/admin/angkatan/edit_data_angkatan", $data);
    }
    
    public function simpan(Request $request)
    {
    	Angkatan::where("id_angkatan", $request->id_angkatan)->update([
    		"tahun_angkatan" => $request->tahun_angkatan
    	]);

    	return redirect()->back()->with("sukses", "Data Berhasil di Ubah");
    }

	public function aktifkan(Request $request)
	{
		Angkatan::where("id_angkatan", $request->id_angkatan)->update([
			"status" => "1"
		]);

		return redirect()->back()->with("sukses", "Data Berhasil di Aktifkan");
	}

	public function non_aktifkan(Request $request)
	{
		Angkatan::where("id_angkatan", $request->id_angkatan)->update([
			"status" => 0
		]);

		return redirect()->back()->with("sukses", "Data Berhasil di Non_Aktifkan");
	}
}
