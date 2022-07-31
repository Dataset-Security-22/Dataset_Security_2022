<?php

namespace App\Http\Controllers;

use App\Models\Kendaraan;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AppController extends Controller
{
    public function login()
    {
        return view("content.auth.login");
    }

    public function post_login(Request $req)
    {
        if (Auth::attempt(["username" => $req->username, "password" => $req->password])) {
            return redirect("/dashboard");
        }

        return redirect("/login");
    }

    public function users()
    {
    	$data["data_users"] = User::where("role", 1)->get();

    	return view("content.users.data_users", $data);
    }

    public function simpan_data_users(Request $req)
    {
    	User::create([
    		"username" => $req->username,
    		"password" => bcrypt($req->password),
    		"role" => $req->role
    	]);

    	return redirect()->back();
    }

    public function edit_users(Request $req)
    {
        $data["edit"] = User::where("id", $req->id)->where("role", 1)->first();

        return view("content.users.update_data_users", $data);
    }

    public function update_data_users(Request $req)
    {
        if ($req->password !=  $req->confirm_password) {
            return redirect()->back();
        } else if($req->password == $req->confirm_password) {
            User::where("id", $req->id)->update([
                "username" => $req->username,
                "password" => bcrypt($req->password)
            ]);

            return redirect()->back();
        }
    }

    public function dashboard()
    {
        $data["data_kendaraan"] = Kendaraan::where("status_rental", "Tersedia")->get();

        return view("content.dashboard", $data);
    }

    public function logout()
    {
        Auth::logout();

        return redirect("/login");
    }
}
