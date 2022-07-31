<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Role;
use App\Models\User;
class RoleController extends Controller
{
    public function index(){

        $data = [

            "roles" => Role::orderBy("nama")->get()
        ];

        return view('/admin/role/role', $data);
    }

    public function add(){
        $data = [
            "roles" => Role::orderBy("nama", "DESC")->get()
        ];
        return view('/admin/role/addrole', $data);
    }

    public function insert(Request $request){

        $message = [
            "required" => "Kolom :attribute wajib diisi",
            'min' => "kolom :attribute minimal harus :min karakter",
            'max' => "kolom :attribute maximal harus :max karakter"

        ];

        $this->validate($request, [
            "nama" => "required|min:4"
        ], $message);

        $cek_double = Role::where(["nama" => $request->nama])->count();

        if ($cek_double > 0) {
            return redirect()->back()->with("gagal", "Tidak Boleh Duplikasi Data");
        }

        Role::create($request->all());

        return redirect('role')->with('sukses','data berhasil di tambahkan');
    }

    public function edit($id_role){
        $data = [
            "edit" => Role::where("id_role", $id_role)->first(),
            "roles" => Role::where("id_role", "!=" , $id_role)->get()
        ];

        return view("/admin/role/editrole", $data);
    }

    public function update(Request $request)
    {
        Role::where("id_role", $request->id_role)->update([
            "nama" => $request->nama,
        ]);

        return redirect("/role");
    }

    public function hapus(Request $request)
    {
        ROle::where("id_role", $request->id_role)->delete();

        return redirect("/role");
    }
}
