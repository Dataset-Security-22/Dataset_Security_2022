<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Jurusan;

class JurusanController extends Controller
{
    public function jurusan()
    {
        $jurusan = [
            "data_jurusan" => Jurusan::all()
        ];
        return view('admin.jurusan.jurusan', $jurusan);
    }

    public function tambahjurusan()
    {
        return view('admin.jurusan.tambahjurusan');
    }

    public function tambahjur(Request $request)
    {
        Jurusan::create(['nama_jurusan' => $request->nama]);
        return redirect("/admin/jurusan")->with('success', 'Post add successfully');
    }

    public function delete($id)
    {
        Jurusan::where("id", $id)->delete();
        return redirect('admin/jurusan')->with('success', "<script>alert('Post deleted successfully')</script>");
    }

    public function edit($id)
    {

        $data = [
            "data_jurusan" => Jurusan::where("id", $id)->first(),
        ];
        return view("admin.jurusan.edit_jurusan", $data);
    }

    public function update(Request $request)
    {
        Jurusan::where("id", $request->id)->update([
            "nama_jurusan" => $request->nama_jurusan
        ]);
        return redirect("/admin/jurusan")->with("success", "Data Berhasil di Simpan");
    }
}
