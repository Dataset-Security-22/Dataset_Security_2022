<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use \App\Models\User;
use \App\Models\Classes;

class ClassController extends Controller
{
	public function index()
	{
		return view('class.index');
	}

	public function get()
	{
		$class = Classes::orderBy('class', 'desc')->get();

		$data = array();

		foreach ($class as $c) {
			$user = User::where('id_class', $c->id)->count('id_class');
			$data[] = array(
				'id' => $c->id,
				'class' => $c->class,
				'user' => $user
			);
		}
		return response()->json($data);
	}

	public function add(Request $request)
	{
		$class = Classes::create([
			'class' => $request->class
		]);

		if ($class) {
			echo 1;
		} else {
			echo 2;
		}
	}

	public function edit(Request $request)
	{
		$class = Classes::where('id', $request->id)->update([
			'class' => $request->class
		]);

		if ($class) {
			echo 1;
		} else {
			echo 2;
		}
	}

	public function del(Request $request)
	{
		if ($request->class == 1) {
			echo 2;
		} else {
			$class = Classes::destroy($request->class);

			if ($class) {
				echo 1;
			} else {
				echo 3;
			}
		}
	}
}
