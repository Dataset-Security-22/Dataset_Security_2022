<?php

namespace App\Http\Controllers;

use App\Models\Admin;
use App\Models\Owner;
use App\Models\User;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function dashboard()
    {
        $data = [
        "jumlah_admin" => User::where('id_role','1')->count(),
        "jumlah_owner" => User::where('id_role','2')->count(),
        "jumlah_buyer" => User::where('id_role','3')->count(),
        ];


        return view("admin.dashboard", $data);
    }
}
