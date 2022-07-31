<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Session;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LogoutController extends Controller
{
    public function index()
    {
        Auth::logout();

        return redirect("/login")->with("session", "Berhasil Logout");
    }
}
