<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Model\Proker;

class ProkerController extends Controller
{
    public function index()
	{
		$data["data_proker"] = Proker::orderBy("nama_proker", "ASC")->get();

		return view("/page/admin/proker/data_proker", $data);
	}

	public function form_tambah()
	{
		return view("/page/admin/proker/form_tambah");
	}

	public function tambah(Request $request)
	{
		Proker::create($request->all());

		return redirect("/page/admin/proker/")->with("sukses", "Data Berhasil di Tambahkan");
	}

	public function hapus(Request $request)
	{
		Proker::where("id_proker", $request->id_proker)->delete();

		return redirect()->back()->with("sukses", "Data berhasil di Hapus");
	}

	public function edit($id_proker)
	{
		$data["edit"] = Proker::where("id_proker", $id_proker)->first();

		return view("/page/admin/proker/form_edit", $data);
	}

	public function simpan(Request $request)
	{
		Proker::where("id_proker", $request->id_proker)->update([
			"nama_proker" => $request->nama_proker,
			"waktu" => $request->waktu,
			"target" => $request->target,
			"parameter" => $request->parameter,
			"metode" => $request->metode,
			"sasaran" => $request->sasaran,
			"kebutuhan" => $request->kebutuhan
		]);

		return redirect()->back()->with("sukses", "Data Berhasil di Ubah");
	}
}
