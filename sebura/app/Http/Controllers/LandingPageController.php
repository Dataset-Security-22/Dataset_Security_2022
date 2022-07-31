<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Session;
use Illuminate\Http\Request;
use App\Models\DataPengurus;

class LandingPageController extends Controller
{
    public function landing()
    {
        // dd(Session::get('pengurus'));
        if (Session::get('pengurus')) {
            return redirect('/pengurus')->with('message', '<script>alert("Harus logout dulu!");</script>');
        } elseif (Session::get('akun')) {
            return redirect('/admin')->with('message', '<script>alert("Harus logout dulu!");</script>');
        } else {
            return view('mahasiswa.home');
        }
    }

    public function home()
    {
        if (Session::get('pengurus')) {
            return redirect('/pengurus')->with('message', '<script>alert("Harus logout dulu!");</script>');
        } elseif (Session::get('akun')) {
            return redirect('/admin')->with('message', '<script>alert("Harus logout dulu!");</script>');
        } else {
            return view('mahasiswa.home');
        }
    }

    public function visimisi()
    {
        return view('mahasiswa.profil.visimisi');
    }

    public function kepengurusan()
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
        return view('mahasiswa.profil.strukturkepengurusan', $data_bph);
    }

    public function chrodpage()
    {
        return view('mahasiswa.informasi.chrodpage');
    }

    public function oprec()
    {
        return view('mahasiswa.informasi.oprec');
    }

    public function pengenalandiv()
    {
        return view('mahasiswa.informasi.pengenalandiv');
    }

    public function login()
    {
        return view('login.login');
    }
}
