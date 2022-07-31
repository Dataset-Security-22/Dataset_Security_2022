<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Murid;
use App\Models\Pelatih;

class AkunController extends Controller
{
    public function index()
    {
        $data = [
            "data_akun" => User::orderBy("name", "ASC")->get()
        ];

        return view("/admin/users/akun", $data);
    }

    public function tambah(Request $request)
    {
        User::create([
            "name" => $request->name,
            "email" => $request->email,
            "password" => bcrypt($request->password),
            "id_role" => 1
        ]);

        return redirect()->back();
    }

    public function hapus(Request $request)
    {
        User::where("id", $request->id)->delete();

        return redirect()->back();
    }

    public function edit($id)
    {
        $data = [
            "edit" => User::where("id", $id)->first(),
            "data_akun" => User::where("id", "!=", $id)->orderBy("id", "ASC")->get()
        ];

        return view("/admin/users/edit_akun", $data);
    }

    public function simpan(Request $request)
    {
        User::where("id", $request->id)->update([
            "name" => $request->name,
            "email" => $request->email,
            "password" => bcrypt($request->password),
            "id_role" =>  $request->id_role,

        ]);

        return redirect("/admin/users");
    }
}
