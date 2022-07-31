<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Acara;
use App\Models\DataPengurus;
use App\Models\Absensi;
use Dflydev\DotAccessData\Data;

class AcaraAbsensiController extends Controller
{
    public function absensi(Acara $acara)
    {
        $absensiacara = [
            "data_absensi" => $acara->absensi,
            "acara" => $acara
        ];

        return view('/admin/absen/absensi', $absensiacara);
    }

    public function tambah(Acara $acara)
    {
        $data = [
            "data_pengurus" => DataPengurus::all(),
            "acara" => $acara
        ];
        return view('/admin/absen/tambah_absensi', $data);
    }


    public function simpan(Acara $acara, Request $request)
    {
        $cek_data = Absensi::where('id_pengurus', $request->pengurus)->get();
        if ($cek_data[0]->id_pengurus == null) {
            $absensi = new Absensi;
            $absensi->keterangan = $request->keterangan;
            $absensi->acara()->associate($acara);
            $absensi->pengurus()->associate($request->pengurus);
            $absensi->save();

            return redirect('/admin/acara/' . $acara->id . '/absensi');
        } else {
            return redirect('/admin/acara/' . $acara->id . '/absensi')
                ->with("<script>alert('Maaf tidak bisa disimpan, data sudah ada ')</script>");
        }
    }

    public function hapus(Request $request)
    {
        Absensi::where("id", $request->id)->delete();
        return redirect()->back()
            ->with('success', "<script>alert('Post deleted successfully')</script>");
    }

    public function edit($id)
    {
        $data = Absensi::findOrFail($id);
        $data_pengurus = DataPengurus::get();
        $keterangan = Acara::get();
        return view('admin.absen.edit_absensi', compact('data_pengurus', 'keterangan', 'data'));
    }

    public function update(Request $request)
    {
        Absensi::where('id', $request->id)->update([
            'keterangan' => $request->keterangan
        ]);

        return redirect("/admin/acara/")->with("success", "Data Berhasil di Simpan");
    }
}
