<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use \App\Models\User;
use \App\Models\Category;

class CategoryController extends Controller
{
	public function index()
	{
		return view('category.index');
	}

	public function get()
	{
		$category = Category::orderBy('category', 'desc')->get();

		$data = array();

		foreach ($category as $c) {
			$user = User::where('id_category', $c->id)->count('id_category');
			$data[] = array(
				'id' => $c->id,
				'category' => $c->category,
				'follower' => $user
			);
		}
		return response()->json($data);
	}

	public function add(Request $request)
	{
		$category = Category::create([
			'category' => $request->category
		]);

		if ($category) {
			echo 1;
		} else {
			echo 2;
		}
	}

	public function edit(Request $request)
	{
		$category = Category::where('id', $request->id)->update([
			'category' => $request->category
		]);

		if ($category) {
			echo 1;
		} else {
			echo 2;
		}
	}

	public function del(Request $request)
	{
		$category = Category::where('id', $request->category)->delete();
		
		if ($category) {
			echo 1;
		} else {
			echo 2;
		}
	}
}
