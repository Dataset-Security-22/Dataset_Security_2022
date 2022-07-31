<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;


class RegisterController extends Controller
{

    public function index()
    {
        return view("register");
    }
    public function cek(Request $request)
    {
        $request->nama;
        $request->email;
        $request->password;

        User::create([
            'nama' =>$request->nama,
            'email'=>$request->email,
            'password'=> bcrypt($request->password),
            'role' => 1
        ]);

        return redirect("/login");
    }
}
