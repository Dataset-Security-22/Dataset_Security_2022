<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Model\Bagian;

class BagianController extends Controller
{
    public function index()
    {
        $data = [
            "data_bagian" => Bagian::orderBy("nama_bagian", "ASC")->get()
        ];

    	return view("/page/admin/bagian/data_bagian", $data);
    }

    public function tambah(Request $request)
    {
    	Bagian::create($request->all());

    	return redirect()->back()->with("sukses", "Data Berhasil di Tambahkan");
    }

    public function hapus($id_bagian)
    {
    	Bagian::where("id_bagian", $id_bagian)->delete();

    	return redirect()->back()->with("sukses", "Data Berhasil di Hapus");
    }

    public function edit($id_bagian)
    {
        $data = [
            "edit" => Bagian::where("id_bagian", $id_bagian)->first(),
            "data_bagian" => Bagian::where("id_bagian", "!=", $id_bagian)->orderBy("nama_bagian", "ASC")->get()
        ];

    	return view("/page/admin/bagian/edit_data_bagian", $data);
    }

    public function simpan(Request $request)
    {
    	Bagian::where("id_bagian", $request->id_bagian)->update([
    		"nama_bagian" => $request->nama_bagian
    	]);

    	return redirect()->back()->with("sukses", "Data Berhasil di Ubah");
    }
}
