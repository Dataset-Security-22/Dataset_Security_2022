<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use App\Models\Model\Berita;
use App\Models\Model\HubungiKami;
use App\Models\Model\PostBlog;
use App\Models\Model\TentangKami;

class AppLandingController extends Controller
{
	public function template_user()
	{
		return view("page/user/layouts/template_user");
	}

    public function index()
    {
        $data = [
            "data_berita" => Berita::orderBy("judul")->get(),
            "data_tentang_kami" => TentangKami::orderBy("judul", "DESC")->paginate(1)
        ];

    	return view("page/user/dashboard", $data);
    }

    public function tentang_kami()
    {
        $data = [
            "data_tentang_kami" => TentangKami::orderBy("judul", "DESC")->paginate(1)
        ];

    	return view("page/user/tentang_kami", $data);
    }

    public function blog()
    {
        $data = [
            "data_blog_post" => PostBlog::orderBy("title", "DESC")->get(),
            "data_berita" => Berita::all()
        ];

    	return view("page/user/blog", $data);
    }

    public function kontak()
    {
    	return view("page/user/kontak");
    }

    public function login()
    {
        return view("page/user/auth/login");
    }

    public function post_login(Request $request)
    {
        $credentials = $request->validate([
            "email" => "required",
            "password" => "required"
        ]);

        $email = $request->email;

        $data = User::where("email", $email)->first();

        $role = $data->id_role;

        if (Auth::attempt(["email" => $request->email, "password" => $request->password, "id_role" => $role, "status" => 1])) {

            $request->session()->regenerate();

            return redirect("/");

        } else {

            return redirect("/login")->with("belum_ada_akses", "Data Anda Belum Diaktifkan");
        }
    }

    public function logout()
    {
        Auth::logout();

        return redirect("/");
    }

    public function register_akun()
    {
        return view("/page/user/auth/register");
    }

    public function cek_register(Request $request)
    {
        User::create([
            "username" => $request->nama,
            "nama" => $request->nama,
            "email" => $request->email,
            "password" => bcrypt($request->password),
            "id_role" => 3,
            "nim" => $request->nim,
            "status" => 0
        ]);

        return redirect("/login");
    }

    public function aktifkan_akun()
    {
        $data = [
            "data_akun" => User::where("nim", "!=", "")->where("status", 0)->get()
        ];

        return view("/page/admin/aktifkan_akun/data", $data);
    }

    public function cek_aktifkan_akun(Request $request)
    {
        User::where("id", $request->id)->update([
            "status" => 1
        ]);   

        return redirect()->back()->with("sukses", "Data Berhasil di Aktifkan");
    }

    public function tambah_pesan(Request $request)
    {
        HubungiKami::create([
            "nama" => $request->nama,
            "email" => $request->email,
            "judul" => $request->judul,
            "pesan" => $request->pesan
        ]);

        return redirect()->back();
    }

    public function galeri()
    {
        $data = [
            "data_berita" => Berita::all()
        ];

        return view("/page/user/galeri", $data);
    }

    public function kirim_pesan(Request $request)
    {
        HubungiKami::create([
            "nama" => $request->nama,
            "email" => $request->email,
            "judul" => $request->judul,
            "pesan" => $request->pesan
        ]);

        return redirect()->back();
    }
}
