<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use App\Models\Acara;
use App\Models\PanitiaAcara;
use App\Models\KeteranganPanitia;
use App\Models\Absensi;
use App\Models\DataPengurus;

class LandingPengurusController extends Controller
{
    public function landing()
    {
        if (Session::get('pengurus')) {
            return redirect('/admin')->with('message', '<script>alert("Harus logout dulu!");</script>');
        } else {
            return view('tampil_pengurus.home');
        }
    }

    public function home()
    {
        if (Session::get('akun')) {
            return redirect('/admin')->with('message', '<script>alert("Harus logout dulu!");</script>');
        } else {
            return view('tampil_pengurus.home');
        }
    }

    public function visidanmisi()
    {
        return view('tampil_pengurus.profil.visimisi');
    }

    public function strukturpengurus()
    {
        $data_bph = [
            "ketua" => DataPengurus::where('jabatan', 1)->first(),
            "wakil_ketua" => DataPengurus::where('jabatan', 2)->first(),
            "sekretaris1" => DataPengurus::where('jabatan', 3)->first(),
            "sekretaris2" => DataPengurus::where('jabatan', 4)->first(),
            "bendahara" => DataPengurus::where('jabatan', 5)->first(),
            "kabid_psda" => DataPengurus::where('jabatan', 6)->first(),
            "anggota_psda" => DataPengurus::where('jabatan', 7)->first(),
            "kasubbid_litbang" => DataPengurus::where('jabatan', 8)->first(),
            "anggota_litbang" => DataPengurus::where('jabatan', 9)->first(),
            "kasubbid_kaderisasi" => DataPengurus::where('jabatan', 10)->first(),
            "anggota_kaderisasi" => DataPengurus::where('jabatan', 11)->first(),
            "kasubbid_investaris" => DataPengurus::where('jabatan', 12)->first(),
            "kabid_humas" => DataPengurus::where('jabatan', 13)->first(),
            "anggota_humas" => DataPengurus::where('jabatan', 14)->first(),
            "kasubbid_humas_eksternal" => DataPengurus::where('jabatan', 15)->first(),
            "anggota_humas_eksternal" => DataPengurus::where('jabatan', 16)->first(),
            "kasubbid_infokom" => DataPengurus::where('jabatan', 17)->first(),
            "anggota_infokom" => DataPengurus::where('jabatan', 18)->first(),
            "kadiv_musik" => DataPengurus::where('jabatan', 19)->first(),
            "kadiv_tari" => DataPengurus::where('jabatan', 20)->first(),
            "pj_tradisional" => DataPengurus::where('jabatan', 21)->first(),
            "pj_modern" => DataPengurus::where('jabatan', 22)->first()

        ];
        return view('tampil_pengurus.profil.strukturkepengurusan', $data_bph);
    }

    public function absensi($id)
    {
        $acara = [
            "data_acara" => Acara::findOrFail($id)
        ];
        return view('tampil_pengurus.informasi.absensi', $acara);
    }

    public function kepanitiaan($id)
    {
        $acara = [
            "data_acara" => Acara::findOrFail($id),
            "ket_panitia" => KeteranganPanitia::all()
        ];
        return view('tampil_pengurus.informasi.kepanitiaan', $acara);
    }

    public function nama_acara()
    {
        $acara = [
            "data_acara" => Acara::with(
                [
                    'absensi' => function ($query) {
                        $query->where('id_pengurus', auth()->user()->id);
                    },
                    'panitia' => function ($query) {
                        $query->where('id_pengurus', auth()->user()->id);
                    }
                ]
            )->get(),
            'ketpanitia' => PanitiaAcara::where('id_pengurus', Session::get('pengurus')['id'])->first()
        ];
        return view('tampil_pengurus.informasi.nama_acara', $acara);
    }

    public function logout()
    {
        Session::flush();
        return redirect('/home');
    }

    public function submitpanitia(Request $request, $id)
    {
        $acara = Acara::findOrFail($id);
        $pengurus = auth()->user();

        $panitia = new PanitiaAcara;
        $panitia->id_ketpanitia = $request->keterangan;
        $panitia->acara()->associate($acara);
        $panitia->pengurus()->associate($pengurus);
        $panitia->save();

        return redirect('/pageacara');
    }

    public function submitabsen(Request $request, $id)
    {
        $acara = Acara::findOrFail($id);
        $pengurus = auth()->user();

        $absensi = new Absensi;
        $absensi->keterangan = $request->keterangan;
        $absensi->acara()->associate($acara);
        $absensi->pengurus()->associate($pengurus);
        $absensi->save();

        return redirect('/pageacara');
    }
}
