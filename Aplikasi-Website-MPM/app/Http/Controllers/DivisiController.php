<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Model\Divisi;
use App\Models\Model\Jabatan;
use App\Models\Model\Bagian;
use App\Models\Model\Anggota;
use App\Models\Model\Angkatan;

class DivisiController extends Controller
{
    public function index()
    {
    	$data = [
    		"data_bagian" => Bagian::orderBy("nama_bagian", "DESC")->get(),
    		"data_jabatan" => Jabatan::orderBy("nama_jabatan", "DESC")->get(),
    		"data_anggota" => Anggota::orderBy("nama", "DESC")->get(),
    		"data_divisi" => Divisi::orderBy("nim_anggota", "DESC")->get()
    	];

    	return view("/page/admin/divisi/data_divisi", $data);
    }

    public function tambah(Request $request)
    {
        $data = Angkatan::where("status", "1")->first();

    	Divisi::create([
            "id_bagian" => $request->id_bagian,
            "nim_anggota" => $request->nim_anggota,
            "id_jabatan" => $request->id_jabatan,
            "id_angkatan" => $data->id_angkatan
        ]);

    	return redirect()->back()->with("sukses", "Data Berhasil di Tambahkan");
        
    }

    public function hapus($id_divisi)
    {
    	Divisi::where("id_divisi", $id_divisi)->delete();

    	return redirect()->back()->with("sukses", "Data Berhasil di Hapus");
    }

    public function edit($id_divisi)
    {
    	$data = [
    		"data_bagian" => Bagian::orderBy("nama_bagian", "DESC")->get(),
    		"data_jabatan" => Jabatan::orderBy("nama_jabatan", "DESC")->get(),
    		"data_anggota" => Anggota::orderBy("nama", "DESC")->get(),
    		"data_divisi" => Divisi::where("id_divisi", "!=", $id_divisi)->orderBy("nim_anggota", "DESC")->get(),
    		"edit" => Divisi::where("id_divisi", $id_divisi)->first()
    	];

    	return view("/page/admin/divisi/edit_data_divisi", $data);
    }

    public function simpan(Request $request)
    {
    	Divisi::where("id_divisi", $request->id_divisi)->update([
    		"id_bagian" => $request->id_bagian,
    		"nim_anggota" => $request->nim_anggota,
    		"id_jabatan" => $request->id_jabatan
    	]);

    	return redirect()->back()->with("sukses", "Data Berhasil di Simpan");
    }
}
