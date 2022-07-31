<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Model\Jabatan;

class JabatanController extends Controller
{
    public function index()
    {
    	$data["data_jabatan"] = Jabatan::orderBy("nama_jabatan", "ASC")->get();

    	return view("/page/admin/jabatan/data_jabatan", $data);
    }

    public function tambah(Request $request)
    {
    	Jabatan::create($request->all());

    	return redirect()->back()->with("sukses", "Data Berhasil di Tambahkan");
    }

    public function hapus(Request $request)
    {
        Jabatan::where("id_jabatan", $request->id_jabatan)->delete();

        return redirect()->back()->with("sukses", "Data Berhasil di Hapus");
    }

    public function edit($id_jabatan)
    {
        $data["edit"] = Jabatan::where("id_jabatan", $id_jabatan)->first();
        $data["data_jabatan"] = Jabatan::where("id_jabatan", "!=", $id_jabatan)->orderBy("nama_jabatan", "ASC")->get();

        return view("/page/admin/jabatan/edit_data_jabatan", $data);
    }

    public function simpan(Request $request)
    {
        Jabatan::where("id_jabatan", $request->id_jabatan)->update([
            "nama_jabatan" => $request->nama_jabatan
        ]);

        return redirect()->back()->with("sukses", "Data Berhasil di Ubah");
    }
}
