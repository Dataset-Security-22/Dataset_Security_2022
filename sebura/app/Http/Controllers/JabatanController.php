<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Jabatan;

class JabatanController extends Controller
{
    public function jabatan()
    {
        $jabatan = [
            "data_jabatan" => Jabatan::all()
        ];
        return view('admin.jabatan.jabatan', $jabatan);
    }

    public function tambahjabatan()
    {
        return view('admin.jabatan.tambahjabatan');
    }

    public function tambahjab(Request $request)
    {
        Jabatan::create(['nama_jabatan' => $request->nama]);
        return redirect("/admin/jabatan")->with('success', 'Post add successfully');
    }

    public function delete($id)
    {
        Jabatan::where("id", $id)->delete();
        return redirect('admin/jabatan')->with('success', "<script>alert('Post deleted successfully')</script>");
    }

    public function edit($id)
    {

        $data = [
            "data_jabatan" => Jabatan::where("id", $id)->first(),
        ];
        return view("admin.jabatan.edit_jabatan", $data);
    }

    public function update(Request $request)
    {
        Jabatan::where("id", $request->id)->update([
            "nama_jabatan" => $request->nama_jabatan
        ]);
        return redirect("/admin/jabatan")->with("success", "Data Berhasil di Simpan");
    }
}
