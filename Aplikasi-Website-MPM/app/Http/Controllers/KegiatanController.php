<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class KegiatanController extends Controller
{
    public function index()
    {
    	$data["data_kegiatan"] = Kegiatan::orderBy("nama_kegiatan", "ASC")->get();

    	return view("/page/admin/kegiatan/data_kegiatan", $data);
    }

    public function tambah(Request $request)
    {
    	Kegiatan::create($request->all());

    	return redirect()->back()->with("sukses", "Data Berhasil di Tambahkan");
    }

    public function hapus(Request $request)
    {
    	Kegiatan::where("id_kegiatan", $request->id_kegiatan)->delete();

    	return redirect()->back()->with("sukses", "Data Berhasil di Hapus");
    }

    public function edit($id_kegiatan)
    {
    	$data["edit"] = Kegiatan::where("id_kegiatan", $id_kegiatan)->first();
    	$data["data_kegiatan"] = Kegiatan::orderBy("id_kegiatan", "!=", "ASC")->get();

    	return view("/page/admin/kegiatan/edit_kegiatan", $data);
    }

    public function simpan(Request $request)
    {
    	Kegiatan::where("id_kegiatan", $request->id_kegiatan)->update([
    		"nama_kegiatan" => $request->nama_kegiatan,
    		"tgl_kegiatan" => $request->tgl_kegiatan,
    		"deskripsi" => $request->deskripsi,
    		"peserta" => $request->peserta
    	]);

    	return redirect()->back()->with("sukses", "Data Berhasil di Ubah");
    }
}
