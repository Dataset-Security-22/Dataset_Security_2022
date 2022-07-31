<?php

namespace App\Http\Controllers;

use App\Models\Asset;
use App\Models\Attribute;
use App\Models\Category;
use App\Models\Condition;
use App\Models\Employe;
use App\Models\Good;
use App\Models\Image;
use App\Models\Stock;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AdminController extends Controller
{
    public function login() {
		return view("content.admin.auth.login");
	}

	public function signin(Request $request) {
		if (Auth::attempt(["name" => $request->name, "password" => $request->password])) {
			return redirect()->intended("/admin/dashboard");
		} else {
			return redirect("/admin/login");
		}
	}

	public function logout() {
		Auth::logout();

		return redirect("/admin/login");
	}

    public function dashboard() {
        $data["data_kategori"] = Category::get()->count();
        $data["data_barang"] = Good::get()->count();
        $data["data_stok"] = Stock::get()->count();
        $data["data_asset"] = Asset::get()->count();
        $data["data_attribut"] = Attribute::get()->count();
        $data["data_karyawan"] = Employe::get()->count();
        $data["data_kondisi"] = Condition::get()->count();
        $data["data_image"] = Image::get()->count();

     	return view("content.admin.dashboard", $data);
    }

    public function akun() {
    	$data["data_akun"] = User::get();

    	return view("content.admin.akun.data_akun", $data);
    }

    public function tambah_akun(Request $request) {
        $message = [
        "unique" => "Nama :attribute tersebut sudah ada",
        "required" => "Kolom :attribute tidak boleh kosong",
        "min" => "Kolom :attribute harus diisi minimal :min digit",
        "max" => "Kolom :attribute tidak boleh lebih dari :max digit"
        ];

        $this->validate($request, [
            "email" => "required|unique:users",
            "password" => "required",
            "name" => "required",
            "role" => "required|min:1"
            ], $message);

    	User::create([
    		"email" => $request->email,
    		"password" => bcrypt($request->password),
    		"name" => $request->name,
    		"role" => $request->role
    	]);

    	return redirect()->back()->with("sukses", "Data Berhasil di Inputkan");
    }

    public function ganti_password($id) {
    	$data["data_akun"] = User::where("id", "!=", $id)->get();
    	$data["edit"] = User::where("id", $id)->first();

    	if (!$data["edit"]) {
    		return redirect()->back()->with("error", "Data Tidak Ada");
    	}

    	return view("content.admin.akun.ganti_password", $data);
    }

    public function reset_password(Request $request) {
    	User::where("id", $request->id)->update([
    		"password" => bcrypt($request->password)
    	]);

    	return redirect()->back()->with("sukses", "Data Berhasil di Update");
    }

    public function delete_akun($id) {
    	User::where("id", $id)->delete();

    	return redirect()->back()->with("sukses", "Data Berhasil di Delete");
    }

    public function data_laporan() {
        return view("content.admin.laporan.data_laporan");
    }
}
