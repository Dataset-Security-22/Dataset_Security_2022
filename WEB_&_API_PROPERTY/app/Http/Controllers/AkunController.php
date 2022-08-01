<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Role;

class AkunController extends Controller
{
    public function index()
    {
        $data = [
            "data_akun" => User::orderBy("name", "ASC")->get(),
            "data_role" => Role::orderBy("nama_role", "DESC")->get(),
        ];
        return view("admin.users.akun", $data);
    }

    public function index_owner()
    {
        $data = [
            // "data_akun" => User::orderBy("name", "ASC")->get(),
            "data_akun" => User::where("id_role", "0")->where("id_role", "3")->get(),
            "data_role" => Role::orderBy("nama_role", "DESC")->get(),
        ];
        return view("owner.update_role.index", $data);
    }

    public function tambah(Request $request)
    {
        User::create([
            "name" => $request->name,
            "email" => $request->email,
            "id_role" => $request->id_role,
            "password" => bcrypt($request->password)
        ]);
        
        return redirect()->back()->with(["message" => "<script>Swal.fire('Berhasil', 'Data Berhasil di Simpan', 'success');</script>"]);
    }

    public function hapus(Request $request)
    {
        User::where("id", $request->id)->delete();

        return redirect()->back()->with("message", "<script>Swal.fire('Berhasil', 'Data Berhasil di Hapus', 'success')</script>");
    }

    public function edit($id)
    {
        $data = [
            "edit" => User::where("id", decrypt($id))->first(),
            "data_akun" => User::where("id", "!=", decrypt($id))->orderBy("id", "ASC")->get(),
            // "edit" => Role::where("id_role", $id_role)->first(),
            "data_role" => Role::orderBy("nama_role", "DESC")->get(),
        ];

        return view("/admin/users/edit_akun", $data);
    }

    public function simpan(Request $request)
    {
        User::where("id", $request->id)->update([
            "name" => $request->name,
            "email" => $request->email,
            "id_role" =>  $request->id_role,
            "password" => bcrypt($request->password),

        ]);
        return redirect("/users")->with(["message" => "<script>Swal.fire('Berhasil', 'Data Berhasil di update', 'success');</script>"]);
        // return redirect("/users");
    }



    public function edit_by_owner(Request $request)
    {
        $data = [
            "edit" => User::where("id", $request->id)->first(),
        ];

        return view("owner.update_role.edit", $data);
    }



    public function simpan_by_owner(Request $request)
    {
        User::where("id", $request->id)->update([
            "id_role" => $request->id_role,
        ]);

        return redirect()->back()->with(["message" => "<script>Swal.fire('Berhasil', 'Data Berhasil di update', 'success');</script>"]);
    }
}
