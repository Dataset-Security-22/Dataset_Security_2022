<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class LandingController extends Controller
{

    public function template_pengunjung()
    {
        return view("layouts/template_pengunjung");
    }

    public function index()
    {
        return view("pengunjung/index");
    }

    public function login()
    {
        return view("pengunjung/login");
    }

    public function kategori()
    {
        return view("/pengunjung/kategori");
    }
}
