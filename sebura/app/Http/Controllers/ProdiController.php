<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Prodi;

class ProdiController extends Controller
{
    public function prodi()
    {
        $prodi = [
            "data_prodi" => Prodi::all()
        ];
        return view('admin.prodi.prodi', $prodi);
    }

    public function tambahprodi()
    {
        return view('admin.prodi.tambahprodi');
    }

    public function tambahpro(Request $request)
    {
        Prodi::create(['nama_prodi' => $request->nama]);
        return redirect("/admin/prodi")->with('success', 'Post add successfully');
    }

    public function delete($id)
    {
        Prodi::where("id", $id)->delete();
        return redirect('admin/prodi')->with('success', "<script>alert('Post deleted successfully')</script>");
    }

    public function edit($id)
    {

        $data = [
            "data_prodi" => Prodi::where("id", $id)->first(),
        ];
        return view("admin.prodi.edit_prodi", $data);
    }

    public function update(Request $request)
    {
        Prodi::where("id", $request->id)->update([
            "nama_prodi" => $request->nama_prodi
        ]);
        return redirect("/admin/prodi")->with("success", "Data Berhasil di Simpan");
    }
}
