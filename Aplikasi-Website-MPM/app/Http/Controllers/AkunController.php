<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Model\Role;
use App\Models\User;

class AkunController extends Controller
{
    public function index()
	{
		$data = [
			"data_role" => Role::orderBy("nama_role", "ASC")->get(),
			"data_users" => User::orderBy("username")->get()
		];

		return view("/page/admin/akun/data_akun", $data);
	}

	public function tambah(Request $request)
	{
		User::create([
			"username" => $request->username,
			"nama" => $request->nama,
			"email" => $request->email,
			"password" => bcrypt($request->password),
			"id_role" => $request->id_role,
			"last_login" => date('Y-m-d H:i:s')
		]);

		return redirect()->back()->with("sukses", "Data Berhasil di Tambahkan");
	}

	public function hapus(Request $request)
	{
		User::where("id", $request->id)->delete();

		return redirect()->back()->with("sukses", "Data Berhasil di Hapus");
	}

	public function edit(Request $request)
	{
		$data = [
			"data_role" => Role::orderBy("nama_role", "ASC")->get(),
			"edit" => User::where("id", $request->id)->first()
		];

		return view("/page/admin/akun/edit_data_akun", $data);
	}
}
