<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Model\LastLogin;

class AppController extends Controller
{
	public function template()
	{
		return view("/page/layouts/template");
	}

	public function dashboard()
	{
		$data = [
			"data_last_login" => LastLogin::orderBy("last_login", "DESC")->get()
		];

		return view("/page/admin/dashboard", $data);
	}

	public function dashboard_bph()
	{
		return view("/page/bph/dashboard");
	}
}
