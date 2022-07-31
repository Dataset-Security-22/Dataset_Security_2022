<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Model\Kelas;
use App\Models\Model\Anggota;

class AnggotaController extends Controller
{
    public function index()
	{
		$data = [
			"data_kelas" => Kelas::orderBy("nama_kelas", "ASC")->get(),
			"data_anggota" => Anggota::orderBy("nama", "ASC")->get()
		];

		return view("/page/admin/anggota/data_anggota", $data);
	}   

	public function tambah(Request $request)
	{
		$validatedData = $request->validate([
			"nim" => "required",
			"nama" => "required",
			"jenis_kelamin" => "required",
			"agama" => "required",
			"no_hp" => "required",
			"alamat" => "required",
			"id_kelas" => "required",
			"gambar" => 'image|file|max:1024'
		]);

		if ($request->file("gambar")) {
			$validatedData['gambar'] = $request->file("gambar")->store("gambar_anggota");
		}

		Anggota::create($validatedData);

		return redirect()->back()->with("sukses", "Data Berhasil di Tambahkan");
	}

	public function hapus($nim)
	{
		Anggota::where("nim", $nim)->delete();

		return redirect()->back()->with("sukses", "Data Berhasil di Hapus");
	}

	public function edit(Request $request)
	{
		$data = [
			"data_kelas" => Kelas::orderBy("nama_kelas", "ASC")->get(),
			"edit" => Anggota::where("nim", $request->nim)->first()
		];

    	return view("page/admin/anggota/edit_data_anggota", $data);	
	}

	public function simpan(Request $request)
	{
		Anggota::where("nim", $request->nim)->update([
			"nama" => $request->nama,
			"jenis_kelamin" => $request->jenis_kelamin,
			"agama" => $request->agama,
			"no_hp" => $request->no_hp,
			"alamat" => $request->alamat,
			"id_kelas" => $request->id_kelas
		]);

		return redirect()->back()->with("sukses", "Data Berhasil di Ubah");
	}

	public function detail($id)
	{
		$data = [
			"detail_anggota" => Anggota::where("id", $id)->first()
		];

		return view("page/admin/anggota/detail_anggota", $data);
	}
}
