<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Model\LastLogin;

class LastLoginController extends Controller
{
    public function index()
    {
    	$data = [
    		"data_last_login" => LastLogin::orderBy("nama", "ASC")->get()
    	];

    	return view("page/admin/last-login/data_last_login", $data);
    }
}
