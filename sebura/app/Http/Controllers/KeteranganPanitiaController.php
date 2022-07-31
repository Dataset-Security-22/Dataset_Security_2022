<?php

namespace App\Http\Controllers;

use App\Models\KeteranganPanitia;
use Illuminate\Http\Request;

class KeteranganPanitiaController extends Controller
{
    public function ketpanitia()
    {
        $ketpanitia = [
            "data_ketpanitia" => KeteranganPanitia::all()
        ];
        return view('admin.ketpanitia.panitia', $ketpanitia);
    }

    public function tambahketpanitia()
    {
        return view('admin.ketpanitia.tambah_panitia');
    }

    public function tambahpan(Request $request)
    {
        KeteranganPanitia::create(['ket_panitia' => $request->ket_panitia]);
        return redirect("/admin/ketpanitia")->with('success', 'Post add successfully');
    }

    public function delete($id)
    {
        KeteranganPanitia::where("id", $id)->delete();
        return redirect('admin/ketpanitia')->with('success', "<script>alert('Post deleted successfully')</script>");
    }

    public function edit($id)
    {

        $data = [
            "data_ketpanitia" => KeteranganPanitia::where("id", $id)->first(),
        ];
        return view("admin.ketpanitia.edit_panitia", $data);
    }

    public function update(Request $request)
    {
        KeteranganPanitia::where("id", $request->id)->update([
            "ket_panitia" => $request->ket_panitia
        ]);
        return redirect("/admin/ketpanitia")->with("success", "Data Berhasil di Simpan");
    }
}
