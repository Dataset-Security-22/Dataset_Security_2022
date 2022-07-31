<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Model\Profil;

class ProfilController extends Controller
{
    public function index()
    {
    	$data = [
    		"data_profil" => Profil::orderBy("id_profil", "ASC")->get()
    	];

    	return view("/page/admin/profil/data_profil", $data);
    }

    public function tambah(Request $request)
    {
    	Profil::create($request->all());

    	return redirect()->back()->with("sukses", "Data Berhasil di Tambahkan");
    }

    public function hapus(Request $request)
    {
    	Profil::where("id_profil", $request->id_profil)->delete();

    	return redirect()->back()->with("sukses", "Data Berhasil di Hapus");
    }

    public function edit($id_profil)
    {
    	$data = [
    		"edit" => Profil::where("id_profil", $id_profil)->first(),
    		"data_profil" => Profil::where("id_profil", "!=", $id_profil)->get()
    	];

    	return view("/page/admin/profil/edit_profil", $data);
    }

    public function simpan(Request $request)
    {
    	Profil::where("id_profil", $request->id_profil)->update([
    		"visi" => $request->visi,
    		"misi" => $request->misi,
    		"tujuan" => $request->tujuan,
    		"fungsi" => $request->fungsi
    	]);

    	return redirect()->back()->with("sukses", "Data Berhasil di Ubah");
    }
}
