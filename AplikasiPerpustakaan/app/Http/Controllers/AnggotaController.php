<?php

namespace App\Http\Controllers;

use App\Models\Anggota;
use App\Models\Prodi;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AnggotaController extends Controller
{
    public function data_anggota()
    {
        $data["data_anggota"] = Anggota::orderBy("nama", "ASC")->get();
        $data["data_prodi"] = Prodi::orderBy("nama_prodi", "ASC")->get();

        return view("content.page.anggota.anggota", $data);
    }

    public function post_anggota(Request $request)
    {
        $message = [
            "required" => "Kolom :attribute tidak boleh kosong",
            "min" => "Kolom :attribute tidak boleh kurang dari :min digit",
            "max" => "Kolom :attribute tidak boleh lebih dari :max digit"
        ];

        $this->validate($request, [
            "nim" => "required|min:1|max:20",
            "nama" => "required",
            "jenis_kelamin" => "required",
            "no_hp" => "required",
            "id_prodi" => "required"
        ], $message);

        Anggota::create([
            "id_user" => Auth::user()->id,
            "nim" => $request->nim,
            "nama" => $request->nama,
            "jenis_kelamin" => $request->jenis_kelamin,
            "no_hp" => $request->no_hp,
            "id_prodi" => $request->id_prodi,
            "tgl_registrasi" => date("Y-m-d")
        ]);

        return redirect()->back()->with("sukses", "Data Berhasil di Inputkan");
    }

    public function edit_anggota(Request $request)
    {
        $data["edit"] = Anggota::where("id", $request->id)->first();
        $data["data_prodi"] = Prodi::orderBy("nama_prodi", "ASC")->get();

        return view("content.page.anggota.edit_anggota", $data);
    }

    public function put_anggota(Request $request)
    {
        $message = [
            "required" => "Kolom :attribute tidak boleh kosong",
            "min" => "Kolom :attribute tidak boleh kurang dari :min digit",
            "max" => "Kolom :attribute tidak boleh lebih dari :max digit"
        ];

        $this->validate($request, [
            "nim" => "required|min:1|max:20",
            "nama" => "required",
            "jenis_kelamin" => "required",
            "no_hp" => "required",
            "id_prodi" => "required"
        ], $message);

        Anggota::where("id", $request->id)->update([
            "nim" => $request->nim,
            "nama" => $request->nama,
            "jenis_kelamin" => $request->jenis_kelamin,
            "no_hp" => $request->no_hp,
            "id_prodi" => $request->id_prodi
        ]);

        return redirect()->back()->with("sukses", "Data Berhasil di Simpan");
    }

    public function hapus_anggota($id)
    {
        Anggota::where("id", $id)->delete();

        return redirect()->back()->with("sukses", "Data Berhasil di Hapus");
    }
}
