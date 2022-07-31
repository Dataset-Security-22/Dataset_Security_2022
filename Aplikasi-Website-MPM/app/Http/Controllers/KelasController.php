<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Model\Prodi;
use App\Models\Model\Kelas;

class KelasController extends Controller
{
    public function index()
	{
		$data["data_prodi"] = Prodi::orderBy("nama_prodi", "ASC")->get();
		$data["data_kelas"] = Kelas::orderBy("nama_kelas", "ASC")->get();

		return view("/page/admin/kelas/data_kelas", $data);
	}

	public function tambah(Request $request)
	{
		Kelas::create($request->all());

		return redirect()->back()->with("sukses", "Data Berhasil di Tambahkan");
	}

	public function hapus($id_kelas)
	{
		Kelas::where("id_kelas", $id_kelas)->delete();

		return redirect()->back()->with("sukses", "Data Berhasil di Hapus");
	}

	public function edit($id_kelas)
	{
		$data["edit"] = Kelas::where("id_kelas", $id_kelas)->first();
		$data["data_prodi"] = Prodi::orderBy("nama_prodi", "ASC")->get();
		$data["data_kelas"] = Kelas::where("id_kelas", "!=" , $id_kelas)->orderBy("nama_kelas", "ASC")->get();

		return view("/page/admin/kelas/edit_data_kelas", $data);
	}

	public function simpan(Request $request)
	{
		Kelas::where("id_kelas", $request->id_kelas)->update([
			"nama_kelas" => $request->nama_kelas,
			"id_prodi" => $request->id_prodi
		]);

		return redirect()->back()->with("sukses", "Data Berhasil di Ubah");
	}
}
