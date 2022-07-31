<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Datatables;

use \App\Models\User;


class StudentController extends Controller
{
	public function index()
	{
		$user = User::where('id_role', 3)->paginate(10);

		if (request('search')) {
			$user = User::where('id_role', 3)->where('name', 'like', '%'.request('search').'%')->paginate(10);
		}

		return view('student.index', compact('user'));
	}

	public function get()
	{
		$user = User::where('id_role', 3)->paginate(10);

		if (request('search')) {
			$user = User::where('id_role', 3)->where('name', 'like', '%'.request('search').'%')->paginate(10);
		}

		$data = array();

		foreach ($user as $u) {
			$data[] = [
				'id' => $u->id,
				'name' => $u->name,
				'nim' => $u->nim,
				'class' => $u->classes->class,
				'category' => $u->category->category,
				'whatsapp' => $u->whatsapp,
			];
		}

		return response()->json($data);
	}

	public function destroy(Request $request)
	{
		foreach ($request->check as $id) {
			User::where('id', $id)->delete();
		}

		return back();
	}
}
