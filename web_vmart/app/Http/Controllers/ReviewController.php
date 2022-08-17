<?php

namespace App\Http\Controllers;
use App\Models\review;
use App\Models\customer;
use App\Models\product_category;
use App\Models\order;
use Illuminate\Http\Request;

class ReviewController extends Controller
{
    public function index(){
        $data = [

            "review" => review::orderBy("id", "DESC")->get(),
        ];
        return view('/admin/review', $data);
    }
}
