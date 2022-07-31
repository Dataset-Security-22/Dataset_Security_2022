<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Acara;

class AcaraController extends Controller
{
    public function daftaracara()
    {
        $acara = [
            "data_acara" => Acara::all()
        ];
        return view('/admin/acara/acara', $acara);
    }

    public function tambahacara()
    {
        return view('/admin/acara/tambah_acara');
    }

    public function addacara(Request $request)
    {
        Acara::create([
            'nama_acara' => $request->nama_acara,
            'tanggal_acara' => $request->tanggal_acara
        ]);
        return redirect("/admin/acara")->with('success', 'Post add successfully');
    }

    public function delete($id)
    {
        Acara::where("id", $id)->delete();
        return redirect('admin/acara')->with('success', "<script>alert('Post deleted successfully')</script>");
    }

    public function edit($id)
    {
        $data = [
            "data_acara" => Acara::where("id", $id)->first(),
        ];
        return view("admin.acara.edit_acara", $data);
    }

    public function update(Request $request)
    {
        Acara::where("id", $request->id)->update([
            "nama_acara" => $request->nama_acara
        ]);
        return redirect("/admin/acara")->with("success", "Data Berhasil di Simpan");
    }
}
