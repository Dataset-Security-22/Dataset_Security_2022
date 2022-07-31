<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function index()
    {
        return view("login");
    }
    public function cek(Request $request)
    {
        $credentials = [
            "email" => $request->email,
            "password" => $request->password
        ];

        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();
            Session::put('email', $request->email);

            return redirect()->intended("/dashboard");
        }

        return redirect()->back()->with("session", "Gagal Login");

    }
}
