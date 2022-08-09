<?php

namespace App\Http\Controllers;

use App\Models\Anggota;
use App\Models\Buku;
use App\Models\Pinjam;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PinjamController extends Controller
{
    public function data_peminjaman()
    {
        $data["data_anggota"] = Anggota::orderBy("nama", "ASC")->get();
        $data["data_buku"] = Buku::orderBy("kode", "ASC")->orderBy("judul", "ASC")->get();
        $data["data_peminjaman"] = Pinjam::get();

        return view("content.page.pinjam.pinjam", $data);
    }

    public function post_peminjaman(Request $request)
    {
        $message = [
            "required" => "Kolom :attribute tidak boleh kosong"
        ];

        $this->validate($request, [
            "id_anggota" => "required",
            "kode_buku" => "required",
            "tgl_pinjam" => "required",
            "tgl_kembali" => "required"
        ], $message);

        Pinjam::create([
            "id_anggota" => $request->id_anggota,
            "kode_buku" => $request->kode_buku,
            "tgl_pinjam" => $request->tgl_pinjam,
            "tgl_kembali" => $request->tgl_kembali,
            "id_user" => Auth::user()->id
        ]);


        return redirect()->back()->with("sukses", "Data Berhasil di Inputkan");
    }

    public function edit_peminjaman(Request $request)
    {
        $data["data_anggota"] = Anggota::get();
        $data["data_buku"] = Buku::get();
        $data["edit"] = Pinjam::where("id", $request->id)->first();

        return view("content.page.pinjam.edit_peminjaman", $data);
    }

    public function put_peminjaman(Request $request)
    {
        Pinjam::where("id", $request->id)->update([
            "id_anggota" => $request->id_anggota,
            "kode_buku" => $request->kode_buku,
            "tgl_pinjam" => $request->tgl_pinjam,
            "tgl_kembali" => $request->tgl_kembali
        ]);

        return redirect()->back()->with("sukses", "Data Berhasil di Simpan");
    }

    public function hapus_peminjaman($id)
    {
        Pinjam::where("id", $id)->delete();

        return redirect()->back()->with("sukses", "Data Berhasil di Hapus");
    }

    public function detail_peminjaman($id)
    {
        $data["detail"] = Pinjam::where("id", $id)->first();

        return view("content.page.pinjam.detail_peminjaman", $data);
    }
}
