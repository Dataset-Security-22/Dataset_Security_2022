<?php

namespace App\Http\Controllers;
use App\Models\Perumahan;
use App\Models\DeskripsiRumah;
use App\Models\FotoSyarat;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Illuminate\support\Facades\DB;
use File;

use Illuminate\Http\Request;

class LandingPageWebController extends Controller
{

    public function index()
    {
        $data = [
            "foto_syarat" => DeskripsiRumah::orderBy("id", "DESC")->get(),
            "stock_baru" => DB::table('orders')->count('id'),
        ];


        return view("Landing.index", $data);
    }

    public function properties()
    {
        $data = [
            "foto_syarat" => DeskripsiRumah::orderBy("id", "DESC")->get()
        ];

        return view("Landing.properties", $data);
    }

    public function blog()
    {
        $data = [
            "foto_syarat" => Perumahan::orderBy("id", "DESC")->get()
        ];

        return view("Landing.blog", $data);
    }

    public function about()
    {
        $data = [
            "foto_syarat" => FotoSyarat::orderBy("id", "ASC")->get()
        ];

        return view("Landing.about", $data);
    }

    public function upload()
    {
        $data = [
            "foto_syarat" => DeskripsiRumah::orderBy("id", "DESC")->get()
        ];

        return view("Landing.upload", $data);
    }



    // public function property()
    // {
    //     $data = [
    //         "foto_syarat" => DeskripsiRumah::orderBy("id", "DESC")->get()
    //     ];

    //     return view("Landing.upload_syarat.index", $data);
    // }

    public function bayar()
    {
        $data = [
            "foto_syarat" => DeskripsiRumah::orderBy("id", "DESC")->get()
        ];

        return view("Landing.view-list", $data);
    }


}
