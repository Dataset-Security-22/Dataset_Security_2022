<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    public function data_user()
    {
        $data["data_user"] = User::where("level", 2)->get();

        return view("content.page.users.users", $data);
    }

    public function post_users(Request $request)
    {
        User::create([
            "name" => $request->name,
            "email" => $request->email,
            "password" => bcrypt($request->password),
            "level" => $request->level,
            "created_by" => Auth::user()->id,
            "updated_by" => Auth::user()->id,
            "active" => 1
        ]);

        return redirect()->back()->with("sukses", "Data Berhasil di Inputkan");
    }

    public function ganti_password(Request $request)
    {
        $data["edit"] = User::where("id", $request->id)->first();

        return view("content.page.users.ganti_password", $data);
    }

    public function put_password(Request $request)
    {
        $message = [
            "required" => "Kolom :attribute tidak boleh kosong"
        ];

        $this->validate($request, [
            "password" => "required",
            "confim_password" => "required"
        ], $message);

        if ($request->password != $request->confim_password) {
            return redirect()->back()->with("error", "Konfirmasi Password Tidak Cocok");
        } else {
            User::where("id", $request->id)->update([
                "password" => bcrypt($request->password)
            ]);

            return redirect()->back()->with("sukses", "Ubah Password Sukses");
        }
    }

    public function put_users(Request $request)
    {
        $message = [
            "required" => "Kolom :attribute tidak boleh kosong"
        ];

        $this->validate($request, [
            "name" => "required",
            "email" => "required"
        ], $message);

        User::where("id", $request->id)->update([
            "name" => $request->name,
            "email" => $request->email
        ]);

        return redirect()->back()->with("sukses", "Data Berhasil di Simpan");
    }

    public function hapus_users($id)
    {
        User::where("id", $id)->delete();

        return redirect()->back()->with("sukses", "Data Berhasil di Hapus");
    }

    public function logout()
    {
        Auth::logout();

        return redirect("/login");
    }

    public function reset_password()
    {
        return view("content.page.auth.reset_password");
    }

    public function put_password_new(Request $request)
    {
        if ($request->password != $request->confirm_password) {
            return redirect()->back()->with("error", "Konfirmasi Password Harus Sama");
        } else {
            User::where("email", $request->email)->update([
                "password" => bcrypt($request->password)
            ]);

            return redirect("/")->with("sukses", "Reset Password Sukses");
        }
    }
}
