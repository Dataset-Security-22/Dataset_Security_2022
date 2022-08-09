<?php

namespace App\Http\Controllers;

use App\Models\Pinjam;
use Illuminate\Http\Request;

class PengembalianController extends Controller
{
    public function data_pengembalian()
    {
        $data["data_peminjaman"] = Pinjam::get();

        return view("content.page.pengembalian.pengembalian", $data);
    }

    public function detail_pengembalian(Request $request)
    {
        $data["detail"] = Pinjam::where("id", $request->id)->first();

        return view("content.page.pengembalian.detail_pengembalian", $data);
    }

    public function pengembalian_buku($id)
    {
        $data["detail"] = Pinjam::where("id", $id)->first();

        return view("content.page.pengembalian.pengembalian_buku", $data);
    }

    public function put_pengembalian_buku(Request $request)
    {
        Pinjam::where("id", $request->id)->update([
            "tgl_mengembalikan" => $request->tgl_mengembalikan,
            "denda" => $request->denda
        ]);

        return redirect("/pengembalian")->with("sukses", "Data Berhasil di Simpan");
    }
}
