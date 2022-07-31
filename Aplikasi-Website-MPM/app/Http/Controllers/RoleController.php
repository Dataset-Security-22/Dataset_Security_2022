<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Model\Role;

class RoleController extends Controller
{
	public function index()
    {
    	$data["data_role"] = Role::orderBy("nama_role", "ASC")->get();

    	return view("/page/admin/role/data_role", $data);
    }

    public function tambah(Request $request)
    {
    	Role::create($request->all());

    	return redirect()->back()->with("sukses", "Data Berhasil di Tambah");
    }

    public function hapus($id_role)
    {
    	Role::where("id_role", $id_role)->delete();

    	return redirect()->back()->with("sukses", "Data Berhasil di Hapus");
    }

    public function edit($id_role)
    {
    	$data["edit"] = Role::where("id_role", $id_role)->first();
    	$data["data_role"] = Role::where("id_role", "!=" , $id_role)->orderBy("nama_role", "ASC")->get();

    	return view("/page/admin/role/edit_data_role", $data);
    }
    
    public function simpan(Request $request)
    {
    	Role::where("id_role", $request->id_role)->update([
    		"nama_role" => $request->nama_role
    	]);

    	return redirect()->back()->with("sukses", "Data Berhasil di Ubah");
    }
}
