<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\User;

class Edit_ProfilController extends Controller
{
    public function index($id)
    {
        $user = User::where('id', $id)->first();
        return view("editprofil", compact('user'));
    }

    public function edit(Request $request, $id)
    {
        $nama = $request->full_name;
        $email = $request->email;
        $password = $request->password;

        User::where('id', $id)->update([
            'nama' => $nama,
            'email' => $email,
            'password'=> bcrypt($request->password)
        ]);

        return redirect('/akun');
    }
}




