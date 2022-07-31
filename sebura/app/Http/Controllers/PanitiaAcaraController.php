<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Acara;
use App\Models\DataPengurus;
use App\Models\KeteranganPanitia;
use App\Models\PanitiaAcara;

class PanitiaAcaraController extends Controller
{
    public function daftarpanitia(Acara $acara)
    {
        $panitiacara = [
            "data_panitia" => $acara->panitia,
            "acara" => $acara
        ];
        return view('/admin/panitia/panitia', $panitiacara);
    }

    public function tambah(Acara $acara)
    {
        $data = [
            "data_pengurus" => DataPengurus::all(),
            "acara" => $acara,
            "data_ketpanitia" => KeteranganPanitia::all()
        ];
        return view('/admin/panitia/tambah_panitia', $data);
    }


    public function simpan(Acara $acara, Request $request)
    {
        $cek_data = PanitiaAcara::where('id_pengurus', $request->pengurus)->first();
        if ($cek_data == null) {
            $panitia = new PanitiaAcara;
            $panitia->ketpanitia()->associate($request->keterangan);
            $panitia->acara()->associate($acara);
            $panitia->pengurus()->associate($request->pengurus);
            $panitia->save();

            return redirect('/admin/acara/' . $acara->id . '/panitia');
        } else {
            return redirect('/admin/acara/' . $acara->id . '/panitia')
                ->with("<script>alert('Maaf tidak bisa disimpan, data sudah ada ')</script>");
        }
    }

    public function hapus(Request $request, $id)
    {
        PanitiaAcara::findOrFail($id)->delete();
        return redirect()->back()
            ->with('success', "<script>alert('Post deleted successfully')</script>");
    }

    public function edit($id)
    {
        $data = PanitiaAcara::findOrFail($id);
        $data_pengurus = DataPengurus::get();
        $data_ketpanitia = KeteranganPanitia::get();
        return view('admin.panitia.edit_panitia', compact('data_pengurus', 'data_ketpanitia', 'data'));
    }

    public function update(Request $request)
    {
        PanitiaAcara::where('id', $request->id)->update([
            'id_ketpanitia' => $request->keterangan
        ]);
        return redirect('/admin/acara/' . $request->id_acara . '/panitia')->with("success", "Data Berhasil di Simpan");
    }

    public function final($id)
    {
        PanitiaAcara::where('id_acara', $id)->update(['final' => 1]);

        return redirect('/admin/acara/' . $id . '/panitia')->with("success", "Data Berhasil di Simpan");
    }
}
