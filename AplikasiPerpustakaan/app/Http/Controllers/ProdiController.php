<?php

namespace App\Http\Controllers;

use App\Models\Prodi;
use Illuminate\Http\Request;

class ProdiController extends Controller
{
    public function data_prodi()
    {
        $data["data_prodi"] = Prodi::orderBy("nama_prodi", "ASC")->get();

        return view("content.page.prodi.data_prodi", $data);
    }

    public function post_prodi(Request $request)
    {
        $message = [
            "required" => "Kolom :attribute tidak boleh kosong"
        ];

        $this->validate($request, [
            "nama_prodi" => "required"
        ], $message);

        $prodi = new Prodi;

        $cek_double = $prodi->where(["nama_prodi" => $request->nama_prodi])->count();

        if ($cek_double > 0) {
            return redirect()->back()->with("error", "Data " . $request->nama_prodi . " Sudah Ada");
        }

        Prodi::create($request->all());

        return redirect()->back()->with("sukses", "Data Berhasil di Inputkan");
    }

    public function edit_prodi($id)
    {
        $data["data_prodi"] = Prodi::where("id", "!=", $id)->orderBy("nama_prodi", "ASC")->get();
        $data["edit"] = Prodi::where("id", $id)->first();

        if (!$data["edit"]) {
            return redirect()->back()->with("error", "Data Tidak Ada");
        }

        return view("content.page.prodi.edit_prodi", $data);
    }

    public function put_prodi(Request $request)
    {
        $message = [
            "required" => "Kolom :attribute tidak boleh kosong"
        ];

        $this->validate($request, [
            "nama_prodi" => "required"
        ], $message);

        $prodi = new Prodi;

        $data = Prodi::where("nama_prodi", $request->nama_prodi_lama)->get();

        $cek_double = $prodi->where(["nama_prodi" => $request->nama_prodi])->get();
        $cek = $prodi->where(["nama_prodi" => $request->nama_prodi])->count();

        if ($data == $cek_double) {
            return redirect()->back()->with("warning", "Tidak ada data yang di ubah");
        } else if ($cek_double != $data) {
            if ($cek > 0) {
                return redirect()->back()->with("error", "Data " . $request->nama_prodi . " Sudah Ada");
            } else {
                Prodi::where("id", $request->id)->update([
                    "nama_prodi" => $request->nama_prodi
                ]);

                return redirect()->back()->with("sukses", "Data Berhasil di Simpan");
            }
        }
    }

    public function hapus_prodi($id)
    {
        Prodi::where("id", $id)->delete();

        return redirect()->back()->with("sukses", "Data Berhasil di Hapus");
    }
}
