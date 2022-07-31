<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Model\Jurusan;
use App\Models\Model\Prodi;

class ProdiController extends Controller
{
    public function index()
    {
    	$data["data_jurusan"] = Jurusan::orderBy("nama_jurusan", "ASC")->get();
    	$data["data_prodi"] = Prodi::orderBy("nama_prodi", "ASC")->get();

    	return view("page/admin/prodi/data_prodi", $data);
    }

    public function tambah(Request $request)
    {
    	Prodi::create($request->all());

    	return redirect()->back()->with("sukses", "Data Berhasil di Tambahkan");
    }

    public function hapus($id_prodi)
    {
    	Prodi::where("id_prodi", $id_prodi)->delete();

    	return redirect()->back()->with("sukses", "Data Berhasil di Hapus");
    }

    public function edit($id_prodi)
    {
        $data["edit"] = Prodi::where("id_prodi", $id_prodi)->first();
        $data["data_prodi"] = Prodi::where("id_prodi", "!=", $id_prodi)->orderBy("nama_prodi", "ASC")->get();
        $data["data_jurusan"] = Jurusan::orderBy("nama_jurusan", "ASC")->get();

        return view("page/admin/prodi/edit_data_prodi", $data);
    }

    public function simpan(Request $request)
    {
        Prodi::where("id_prodi", $request->id_prodi)->update([
            "nama_prodi" => $request->nama_prodi,
            "id_jurusan" => $request->id_jurusan
        ]);

        return redirect()->back()->with("sukses", "Data Berhasil di Ubah");
    }
}
