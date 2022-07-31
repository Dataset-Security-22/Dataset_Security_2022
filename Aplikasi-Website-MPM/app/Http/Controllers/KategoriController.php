<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Model\Kategori;
use Illuminate\Support\Str;

class KategoriController extends Controller
{
	public function index()
	{
		$data = [
			"data_kategori" => Kategori::orderBy("nama_kategori", "DESC")->get()
		];

		return view("/page/admin/kategori/data_kategori", $data);
	}

	public function tambah(Request $request)
	{
		Kategori::create([
			"nama_kategori" => $request->nama_kategori,
			"slug" => Str::slug($request->nama_kategori)
		]);

		return redirect()->back()->with("sukses", "Data Berhasil di Tambahkan");
	}

	public function edit($id_kategori)
	{
		$data = [
			"edit" => Kategori::where("id_kategori", $id_kategori)->first(),
			"data_kategori" => Kategori::where("id_kategori", "!=", $id_kategori)->get()
		];

		return view("/page/admin/kategori/edit_data_kategori", $data);
	}

	public function simpan(Request $request)
	{
		Kategori::where("id_kategori", $request->id_kategori)->update([
			"nama_kategori" => $request->nama_kategori
		]);

		return redirect()->back()->with("sukses", "Data Berhasil di Simpan");
	}

	public function hapus($id_kategori)
	{
		Kategori::where("id_kategori", $id_kategori)->delete();

		return redirect()->back()->with("sukses", "Data Berhasil di Hapus");
	}
}
