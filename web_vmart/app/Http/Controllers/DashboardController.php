<?php

namespace App\Http\Controllers;
use App\Models\payment;
use Illuminate\Http\Request;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Dashboard extends Controller{
    public function index(){
        $data=[
            "jumlah_payment" => payment::count(),
        ];
        return view('admin/dashboard',$data);
    }
}
