<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\skd;
use App\Models\sku;
use App\Models\sktm;
use App\Models\penduduk;
use App\Models\akun;


class AppController extends Controller
{
    public function app()
    {
        echo "dashboard";
    }

    public function dashboard()
    {
        $data = [
            "data_skd" => skd::count(),
            "data_sku" => sku::count(),
            "data_sktm" => sktm::count(),
            "data_penduduk" => penduduk::count(),
            "data_users" => akun::count()


        ];

        return view("dashboard", $data);
    }
}
