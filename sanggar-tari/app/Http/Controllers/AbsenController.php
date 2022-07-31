<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Absen;
use App\Models\Murid;

class AbsenController extends Controller
{
    public function hari_ini()
    {
        $data = [
            "data_absen" => Absen::orderBy("id_absen", "DESC")->get(),
            "data_murid" => Murid::orderBy("nama_murid", "DESC")->get(),
        ];

        return view("/pelatih/absen/data_absen", $data);
    }

    public function tambah_absen_hari_ini(Request $request)
    {
        
        if ($request->status == 1) {
            $cetak = "Hadir";
        } else if ($request->status == 2 || $request->status == 3 || $request->status == 3 || $request->status == 4) {
            $cetak = $request->keterangan;
        } else {
            $cetak = "Tidak ada";
        }

        Absen::create([
            "id_murid" => $request->id_murid,
            "status" => $request->status,
            "tanggal" => date("Y-m-d"),
            "keterangan" => $cetak,
            "id_users" => auth()->user()->id
        ]);

        return redirect()->back()->with("sukses", "Data Berhasil di Tambahkan");
        
    }

    public function pertanggal()
    {
        $data = [
            "data_murid" => Murid::orderBy("nama_murid", "DESC")->get(),
            "data_absen" => Absen::orderBy("id_murid", "DESC")->get()
        ];

        return view("pelatih/absen/data_absen_per_tanggal", $data);
    }

    public function edit_absen(Request $request)
    {
        $data = [
            "data_murid" => Murid::orderBy("nama_murid", "DESC")->get(),
            "edit" => Absen::where("id_absen", $request->id_absen)->first()
        ];

        return view("pelatih/absen/edit_data_absen", $data);
    }

    public function simpan_data_edit_absen(Request $request)
    {
        Absen::where("id_absen", $request->id_absen)->update([
            "id_murid" => $request->id_murid,
            "status" => $request->status,
            "tanggal" => $request->tanggal,
            "keterangan" => $request->keterangan,
            "id_users" => auth()->user()->id
        ]);

        return redirect()->back();
    }

    public function tambah_absen_pertanggal(Request $request)
    {
        Absen::create([
            "id_murid" => $request->id_murid,
            "status" => $request->status,
            "tanggal" => $request->tanggal,
            "keterangan" => $request->keterangan,
            "id_users" => auth()->user()->id
        ]);

        return redirect()->back();
    }

    public function hapus(Request $request)
    {
        Absen::where("id", $request->id)->delete();

        return redirect()->back();
    }

    public function edit($id)
    {
        $data = [
            "edit" => Absen::where("id", $id)->first(),
            "data_absen" => Absen::where("id", "!=", $id)->orderBy("absen_murid", "ASC")->get()
        ];

        return view("/pelatih/absen/edit_absen", $data);
    }

    public function simpan(Request $request)
    {
        Nilai::where("id", $request->id)->update([
            "absen_murid" => $request->absen_murid,
            "tanggal" => $request->status,
            "keterangan" => $request->keterangan

        ]);

        return redirect("/pelatih/absen");
    }
}
