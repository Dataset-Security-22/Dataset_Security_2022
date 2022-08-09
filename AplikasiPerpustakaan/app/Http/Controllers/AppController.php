<?php

namespace App\Http\Controllers;

use App\Models\Anggota;
use App\Models\Buku;
use App\Models\Kategori;
use App\Models\Pinjam;
use App\Models\Rak;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AppController extends Controller
{
    public function template()
    {
        return view("content.page.layouts.template");
    }
    public function login()
    {
        return view("content.page.auth.login");
    }
    public function post_login(Request $req)
    {
        if (Auth::attempt(['email' => $req->email, 'password' => $req->password, 'active' => 1])) {
            return redirect("/dashboard")->with("sukses", "Anda Sudah Login");
        } else {
            $data['message'] = "Login gagal";
            return redirect("/")->with($data);
        }
    }
    public function dashboard()
    {
        $data["total_kategori"] = Kategori::count();
        $data["total_rak"] = Rak::count();
        $data["total_anggota"] = Anggota::count();
        $data["total_buku"] = Buku::count();
        $data["total_peminjam"] = Pinjam::count();
        $data["total_pengembalian"] = Pinjam::where("tgl_mengembalikan", "!=", NULL)->count();
        $date = date("Y-m-d");
        $data["data_peminjaman"] = Pinjam::where("tgl_pinjam", $date)->get();

        return view("content.page.dashboard", $data);
    }

    public function help()
    {
        return view("content.page.help");
    }
}
