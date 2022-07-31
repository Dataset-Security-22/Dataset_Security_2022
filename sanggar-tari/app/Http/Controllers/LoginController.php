<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function login()
    {
        return view("/auth/login");
    }

    public function post_login(Request $request)
    {
        if(Auth::attempt(["email" =>$request->email,"password" => $request->password
        ])) {
            $request->session()->regenerate();

            $data = auth()->user()->id_role;

            if ($data == 1) {

                return redirect("/admin/dashboard");

            } else if ($data == 2) {

                return redirect("/pelatih/dashboard");

            } else if ($data == 3) {

                return redirect("/");

            }

        } else {

            return redirect()->back();

        }
    }


    public function logout()
    {
        Auth::logout();

        return redirect("/admin/login");
    }
}