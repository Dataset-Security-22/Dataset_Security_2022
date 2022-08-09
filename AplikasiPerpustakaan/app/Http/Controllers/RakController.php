<?php

namespace App\Http\Controllers;

use App\Models\Rak;
use Illuminate\Http\Request;

class RakController extends Controller
{
    public function data_rak()
    {
        $data['data_rak'] = Rak::orderBy("nama_rak", "ASC")->get();

        return view("content.page.rak.rak", $data);
    }

    public function post_rak(Request $request)
    {
        $message = [
            "required" => "Kolom :attribute tidak boleh kosong"
        ];

        $this->validate($request, [
            "nama_rak" => "required"
        ]);

        $rak = new Rak;

        $cek_double = $rak->where(["nama_rak" => $request->nama_rak])->count();

        if ($cek_double > 0) {
            return redirect()->back()->with("error", "Data " . $request->nama_rak . " Sudah Ada");
        }

        Rak::create($request->all());

        return redirect()->back()->with("sukses", "Data Berhasil di Inputkan");
    }

    public function edit_rak($id)
    {
        $data["data_rak"] = Rak::where("id", "!=", $id)->orderBy("nama_rak", "ASC")->get();
        $data["edit"] = Rak::where("id", $id)->first();

        if (!$data["edit"]) {
            return redirect()->back()->with("error", "Data Tidak Ada");
        }

        return view("content.page.rak.edit_rak", $data);
    }

    public function put_rak(Request $request)
    {
        $message = [
            "required" => "Kolom :attribute tidak boleh kosong"
        ];

        $this->validate($request, [
            "nama_rak" => "required"
        ], $message);

        $rak = new Rak;

        $data = Rak::where("nama_rak", $request->nama_lama_rak)->get();

        $cek_double = $rak->where(["nama_rak" => $request->nama_rak])->get();
        $cek = $rak->where(["nama_rak" => $request->nama_rak])->count();

        if ($data == $cek_double) {
            return redirect()->back()->with("warning", "Tidak ada data yang di ubah");
        } else if ($cek_double != $data) {
            if ($cek > 0) {
                return redirect()->back()->with("error", "Data " . $request->nama_rak . " Sudah Ada");
            } else {
                Rak::where("id", $request->id)->update([
                    "nama_rak" => $request->nama_rak
                ]);

                return redirect()->back()->with("sukses", "Data Berhasil di Simpan");
            }
        }
    }

    public function hapus_rak($id)
    {
        Rak::where("id", $id)->delete();

        return redirect()->back()->with("sukses", "Data Berhasil di Hapus");
    }
}
