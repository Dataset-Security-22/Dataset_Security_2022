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


        return redirect()->back()->with(["message" => "<script>Swal.fire('Berhasil', 'Data Berhasil di Simpan', 'success');</script>"]);

    }

    public function hapus(Request $request)
    {
        Role::where("id", $request->id)->delete();
        return redirect()->back()->with("message", "<script>Swal.fire('Berhasil', 'Data Berhasil di Hapus', 'success')</script>");
    }

    public function edit($id)
    {
        $data = [
            "edit" => Role::where("id", decrypt($id))->first(),
            "data_role" => Role::where("id", "!=", decrypt($id))->orderBy("nama_role", "ASC")->get()
        ];

        return view("/admin/role/edit_role", $data);
    }

    public function simpan(Request $request)
    {
        Role::where("id", $request->id)->update([
            "nama_role" => $request->nama_role
        ]);

        return redirect("/admin/role")->with(["message" => "<script>Swal.fire('Berhasil', 'Data Berhasil di update', 'success');</script>"]);
    }
}
