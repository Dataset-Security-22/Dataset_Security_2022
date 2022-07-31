<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Model\Berita;
use Illuminate\Support\Facades\Storage;

class BeritaController extends Controller
{
    public function index()
	{
		$data = [
			"data_berita" => Berita::orderBy("id", "ASC")->get()
		];

		return view("/page/admin/berita/data_berita", $data);
	}

	public function tambah(Request $request)
	{

		$validatedData = $request->validate([
			"judul" => "required",
			"id_users" => "required",
			"gambar" => 'image|file|max:1024'
		]);

		if ($request->file("gambar")) {
			$validatedData['gambar'] = $request->file("gambar")->store("post-images");
		}

		Berita::create($validatedData);

		return redirect()->back()->with("sukses", "Data Berhasil di Tambah");
	}

	public function hapus(Request $request)
	{
		if ($request->gambar) {
			Storage::delete($request->gambar);
		}

		Berita::where("id", $request->id)->delete();

		return redirect()->back()->with("sukses", "Data Berhasil di Hapus");
	}

	public function edit($id)
	{
		$data = [
			"edit" => Berita::where("id", $id)->first(),
			"data_berita" => Berita::where("id", "!=", $id)->get()
		];

		return view("/page/admin/berita/edit_data_berita", $data);
	}

	public function simpan(Request $request)
	{
		$validatedData = $request->validate([
			"judul" => "required",
			"gambar" => 'image|file|max:1024'
		]);

		if ($request->file("gambar")) {

			if ($request->oldImage) {
				Storage::delete($request->oldImage);
			}

			$validatedData['gambar'] = $request->file("gambar")->store("post-images");
		}

		Berita::where("id", $request->id)->update($validatedData);

		return redirect()->back();
	}

	public function aktifkan(Request $request)
	{
		Berita::where("id", $request->id)->update([
			"status" => "1"
		]);

		return redirect()->back()->with("sukses", "Data Berhasil di Aktifkan");
	}

	public function non_aktifkan(Request $request)
	{
		Berita::where("id", $request->id)->update([
			"status" => "0"
		]);

		return redirect()->back()->with("sukses", "Data Berhasil di Non - Aktifkan");
	}
}
