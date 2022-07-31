<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use App\Models\Login;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function login(Request $request)
    {
        $credentials = $request->validate([
            'email' => ['required', 'email'],
            'password' => ['required'],
        ]);

        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();
            $user = auth()->user();
            if ($user->role == 1) {
                Session::put('akun', $user);
                return redirect('/admin');
            } else {
                Session::put('pengurus', $user);
                return redirect('/pengurus');
            }
        }

        return back()->withErrors([
            'email' => 'The provided credentials do not match our records.',
        ]);

        // $login = Login::where('username', $request->username)->first();
        // if ($login) {
        //     if (password_verify($request->password, $login->password)) {
        //         if ($login->role == 1) {
        //             Session::put('akun', $login);
        //             return redirect('/admin');
        //         } else {
        //             Session::put('pengurus', $login);
        //             return redirect('/pengurus');
        //         }
        //     } else {
        //         return redirect()->back();
        //     }
        // } else {
        //     return redirect()->back();
        // }
    }

    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect('/');
    }

    public function store(Request $request)
    {
        $request->validate([
            'username' => 'required',
            'password' => "required",
            'role' => 'required'
        ]);
        Login::create($request->all());
        return redirect()->back()->with('success', 'Post updated successfully');
    }

    public function destroy($id)
    {
        Login::where("id", $id)->delete();

        return redirect()->back()
            ->with('success', "<script>alert('Post deleted successfully')</script>");
    }
}
