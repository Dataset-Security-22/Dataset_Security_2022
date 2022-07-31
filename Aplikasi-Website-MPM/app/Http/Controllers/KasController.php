<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Model\Divisi;
use App\Models\Model\Anggota;
use App\Models\Model\Kas;

class KasController extends Controller
{
	public function data_kas_sekarang()
	{
		$data = [
			"data_divisi" => Divisi::all()
		];

		return view("page/bph/kas/data_kas_sekarang", $data);
	}

	public function simpan_data_kas(Request $request)
	{
		Kas::create([
			"id_users" => auth()->user()->id,
			"nim_anggota" => $request->nim_anggota,
			"bayar" => $request->bayar,
			"tanggal" => date("Y-m-d"),
			"keterangan" => $request->keterangan,
			"status" => 1
		]);

		return redirect()->back()->with("sukses", "Data Berhasil di Tambahkan");
	}

	public function data_kas_pertanggal()
	{
		$data = [
			"data_divisi" => Divisi::all(),
			"data_kas" => Kas::orderBy("nim_anggota", "DESC")->get()
		];

		return view("page/bph/kas/data_kas_pertanggal", $data);
	}

	public function tambah_kas_pertanggal(Request $request)
	{
		Kas::create([
			"id_users" => auth()->user()->id,
			"nim_anggota" => $request->nim_anggota,
			"bayar" => $request->bayar,
			"tanggal" => $request->tanggal,
			"keterangan" => $request->keterangan,
			"status" => 1
		]);

		return redirect()->back();
	}

	public function edit_kas_pertanggal(Request $request)
	{
		$data = [
			"data_divisi" => Divisi::all(),
			"edit" => Kas::where("id_kas", $request->id_kas)->first()
		];

		return view("page/bph/kas/edit_data_kas_pertanggal", $data);
	}

	public function simpan_data_kas_pertanggal(Request $request)
	{
		Kas::where("id_kas", $request->id_kas)->update([
			"id_users" => auth()->user()->id,
			"nim_anggota" => $request->nim_anggota,
			"bayar" => $request->bayar,
			"tanggal" => $request->tanggal,
			"keterangan" => $request->keterangan
		]);

		return redirect()->back();
	}

    public function index()
	{
		$data = [
			"data_anggota" => Anggota::orderBy("nim", "DESC")->get(),
			"data_divisi" => Divisi::get()
		];

		return view("page/bph/kas/data_kas", $data);
	}

	public function tambah(Request $request)
	{
		$data = [
			"tambah" => Divisi::where("id_divisi", $request->id_divisi)->first() 
		];

		return view("page/bph/kas/tambah", $data);
	}

	public function simpan(Request $request)
	{
		Kas::create([
			"id_users" => auth()->user()->id,
			"nim_anggota" => $request->nim_anggota,
			"bayar" => $request->bayar,
			"tanggal" => $request->tanggal,
			"keterangan" => $request->keterangan,
			"status" => 1
		]);

		return redirect()->back()->with("sukses", "Data Berhasil di Tambahkan");
	}

	public function data_kas()
	{
		$data = [
			"data_kas" => Kas::get()
		];

		return view("page/bph/kas/data_uang_kas", $data);
	}

	public function laporan_data_kas()
	{
		$data = [
			"data_divisi" => Divisi::orderBy("id_divisi", "DESC")->get()
		];

		return view("page/bph/laporan/data_kas", $data);
	}

	public function detail_laporan_kas($id_divisi)
	{
		$data = [
			"detail" => Divisi::where("id_divisi", $id_divisi)->orderBy("id_divisi", "DESC")->first()
		];

		return view("page/bph/laporan/detail_laporan_kas", $data);
	}
}
