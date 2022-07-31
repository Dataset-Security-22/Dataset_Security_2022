<?php

namespace App\Http\Controllers;

use App\Models\Pelanggan;
use App\Models\Pembayaran;
use App\Models\Penggunaan;
use App\Models\Petugas;
use App\Models\Tagihan;
use App\Models\Tarif;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AdminController extends Controller
{
    public function login()
    {
        return view("content.auth.login");
    }

    public function signin(Request $req)
    {
        if (Auth::attempt(["username" => $req->username, "password" => $req->password])) {
            return redirect("/dashboard");
        }

        return redirect("/login");
    }

    public function dashboard()
    {
        $data["tarif"] = Tarif::count();
        $data["pelanggan"] = Pelanggan::count();
        $data["penggunaan"] = Penggunaan::count();
        $data["tagihan"] = Tagihan::count();
        $data["pembayaran"] = Pembayaran::count();
        $data["petugas"] = Petugas::count();

        return view("content.dashboard", $data);
    }

    public function users()
    {
        $data["data_users"] = User::get();

        return view("content.users.data_users", $data);
    }

    public function simpan_data_users(Request $req)
    {
        User::create([
            "id" => $req->id,
            "nama" => $req->nama,
            "alamat" => $req->alamat,
            "no_telepon" => $req->no_telepon,
            "saldo" => $req->saldo,
            "biaya_admin" => $req->biaya_admin,
            "username" => $req->username,
            "password" => bcrypt($req->password),
            "role" => $req->role
        ]);

        return redirect()->back();
    }

    public function logout()
    {
        Auth::logout();

        return redirect()->back();
    }
}
