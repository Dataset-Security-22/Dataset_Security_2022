<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Form;

class FormController extends Controller
{
    public function index()
    {
    	$data = [
    		"data_form" => Form::orderBy("nama", "DESC")->get()
    	];

    	return view("admin/form/data_form", $data);
    }


    public function store()
    {
        return view("/pengunjung/form/addform");
    }

    public function tambah(Request $request)
    {
        Form::create($request->all());

        return redirect("/")->with("sukses");
    }

    public function hapus(Request $request)
    {
        Form::where("id", $request->id)->delete();

        return redirect()->back();
    }
    
}
