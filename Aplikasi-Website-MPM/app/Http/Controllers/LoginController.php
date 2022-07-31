<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use App\Models\Model\LastLogin;

class LoginController extends Controller
{
    public function login()
    {
    	return view("/page/auth/login");
    }

    public function post_login(Request $request)
    {
    	$credentials = $request->validate([
    		"username" => "required",
    		"password" => "required"
    	]);

        if (Auth::attempt(["username" => $request->username, "password" => $request->password])) {

            $request->session()->regenerate();

            $data = auth()->user()->id_role;

            if ($data == 2) {

                return redirect("/page/bph/dashboard")->with("sukses", "Anda Berhasil Login");

            } else if ($data == 1) {

                return redirect("/page/admin/dashboard")->with("sukses", "Anda Berhasil Login");

            } else if ($data == 3) {

                return redirect("/")->with("sukses", "Anda Berhasil Login");

            }
            
        } else {
            return redirect()->back();
        }
    }

    public function logout()
    {
    	$user = Auth::user()->id;

        LastLogin::create([
            "nama" => auth()->user()->nama,
            "last_login" => date("Y-m-d H:i:s")
        ]);

		Auth::logout();

		return redirect("/page/login");
    }
}
