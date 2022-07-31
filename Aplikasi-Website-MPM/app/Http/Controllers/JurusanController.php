<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Model\Jurusan;

class JurusanController extends Controller
{
    public function index()
    {
        $data = [
            "data_jurusan" => Jurusan::orderBy("nama_jurusan", "DESC")->get()
        ];

    	return view("page/admin/jurusan/data_jurusan", $data);
    }

    public function tambah(Request $request)
    {
        $message = [
            "required" => "Kolom :attribute tidak boleh kosong"
        ];

        $this->validate($request, [
            "nama_jurusan" => "required"
        ], $message);

    	Jurusan::create($request->all());

    	return redirect()->back()->with("sukses", "Data Berhasil di Tambahkan");
    }

    public function hapus($id_jurusan)
    {
    	Jurusan::where("id_jurusan", $id_jurusan)->delete();
    	
    	return redirect()->back()->with("sukses", "Data Berhasil di Hapus");
    }

    public function edit($id_jurusan)
    {
    	$data["edit"] = Jurusan::where("id_jurusan", $id_jurusan)->first();
    	$data["data_jurusan"] = Jurusan::where("id_jurusan", "!=", $id_jurusan)->orderBy("nama_jurusan", "ASC")->get();

    	return view("page/admin/jurusan/edit_data_jurusan", $data);
    }

    public function simpan(Request $request)
    {
        Jurusan::where("id_jurusan", $request->id_jurusan)->update([
            "nama_jurusan" => $request->nama_jurusan
        ]); 

        return redirect()->back()->with("sukses", "Data Berhasil di Ubah");
    }
}
