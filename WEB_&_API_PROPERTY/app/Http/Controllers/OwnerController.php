<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Perumahan;
use App\Models\DeskripsiRumah;
use App\Models\User;

class OwnerController extends Controller
{
    public function dashboard()
    {
        $data = [
            "jumlah_property" => Perumahan::where("id_user", auth()->user()->id)->count(),
            "jumlah_rumah" => DeskripsiRumah::where("id_user", auth()->user()->id)->count(),
            "jumlah_buyer" => User::where('id_role','3')->count(),
        ];


        return view("owner.dashboard", $data);
    }

    public function template_owner()
    {
    	return view("layouts.template_owner");
    }
}
