<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Divisi;

class DivisiController extends Controller
{
    public function divisi()
    {
        $divisi = [
            "data_divisi" => Divisi::all()
        ];
        return view('admin.divisi.divisi', $divisi);
    }

    public function tambahdivisi()
    {
        return view('admin.divisi.tambahdivisi');
    }

    public function tambahdiv(Request $request)
    {
        Divisi::create(['nama_divisi' => $request->nama]);
        return redirect("/admin/divisi")->with('success', 'Post add successfully');
    }

    public function delete($id)
    {
        Divisi::where("id", $id)->delete();
        return redirect('admin/divisi')->with('success', "<script>alert('Post deleted successfully')</script>");
    }

    public function edit($id)
    {

        $data = [
            "data_divisi" => Divisi::where("id", $id)->first(),
        ];
        return view("admin.divisi.edit_divisi", $data);
    }

    public function update(Request $request)
    {
        Divisi::where("id", $request->id)->update([
            "nama_divisi" => $request->nama_divisi
        ]);
        return redirect("/admin/divisi")->with("success", "Data Berhasil di Simpan");
    }
}
