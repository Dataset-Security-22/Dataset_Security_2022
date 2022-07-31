<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Role;

class RoleController extends Controller
{
    public function index()
    {
        $data = [
            "data_role" => Role::orderBy("nama_role", "ASC")->get()
        ];

        return view("/admin/role/data_role", $data);
    }

    public function tambah(Request $request)
    {
        Role::create($request->all());

        return redirect()->back();
    }

    public function hapus(Request $request)
    {
        Role::where("id_role", $request->id_role)->delete();

        return redirect()->back();
    }

    public function edit($id_role)
    {
        $data = [
            "edit" => Role::where("id", $id_role)->first(),
            "data_role" => Role::where("id", "!=", $id_role)->orderBy("nama_role", "ASC")->get()
        ];

        return view("/admin/role/edit_role", $data);
    }

    public function simpan(Request $request)
    {
        Role::where("id_role", $request->id_role)->update([
            "nama_role" => $request->nama_role,
            "id_role" => $request->id_role
        ]);

        return redirect("/admin/role");
    }
}