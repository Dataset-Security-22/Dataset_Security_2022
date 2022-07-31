<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AppController extends Controller
{
    public function template_pelatih()
    {
    	return view("layouts/template_pelatih");
    }

    public function dashboard()
    {
    	return view("pelatih/dashboard");
    }
}
