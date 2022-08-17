<?php

namespace App\Http\Controllers;
use App\Models\order;
use App\Models\customer;
use App\Models\product;
use Illuminate\Http\Request;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
class OrderController extends Controller
{
    public function index(){
        $data = [
            "orders" => order::orderBy("id", "DESC")->get(),
            "products" => product::orderBy("id", "DESC")->get(),
            "customers" => customer::orderBy("id", "DESC")->get()


        ];
        return view('/admin/pesanan/pesanan', $data);
    }
    public function view($id){
        $data = [
            "detail" => order::where("id", $id)->first(),
            "products" => product::where("id", $id)->first(),
            "customers" => customer::where("id", $id)->first()
        ];
    return view('/admin/pesanan/detail_pesanan', $data);
    }
}
