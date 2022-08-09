<?php

namespace App\Http\Controllers;

use App\Models\Pinjam;
use Illuminate\Http\Request;

class LaporanController extends Controller
{
    public function laporan()
    {
        $data["data_peminjaman"] = Pinjam::orderBy("tgl_pinjam", "ASC")->orderBy("kode_buku", "ASC")->get();

        return view("content.page.laporan.laporan", $data);
    }

    public function laporan_perhari()
    {
        $date = date("Y-m-d");
        $data["data_peminjaman"] = Pinjam::where("tgl_pinjam", $date)->get();

        return view("content.page.laporan.laporan_perhari", $data);
    }
}
