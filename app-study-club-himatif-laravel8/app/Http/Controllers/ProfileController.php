<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;

use \App\Models\User;
use \App\Models\Classes;

class ProfileController extends Controller
{
	public function index()
	{
		$user = User::where('email', Session::get('email'))->first();
		$class = Classes::all();
		return view('profile', compact('user', 'class'));
	}

	public function password()
	{
		return view('password');
	}

	public function update(Request $request)
	{
		$request->validate([
			'nim' => 'required|unique:users,nim',
		]);

		$user = User::where('email', Session::get('email'))->first();
		User::where('email', Session::get('email'))->update([
			'name' => $request->name,
			'nim' => $request->nim,
			'whatsapp' => $request->whatsapp,
			'id_class' => $request->class,
		]);

		if ($user->nim == '') {
			return redirect('dashboard')->with('message', "<script>swal('Wooww!', 'Profile anda berhasil diupdate!', 'success');</script>");
		} else {
			return redirect('profile')->with('message', "<script>swal('Wooww!', 'Profile anda berhasil diupdate!', 'success');</script>");
		}
	}

	public function change(Request $request)
	{
		$user = User::where('email', Session::get('email'))->first();

		if (Hash::check($request->current, $user->password)) {
			User::where('email', Session::get('email'))->update([
				'password' => Hash::make($request->new),
			]);

			return redirect('profile')->with('message', "<script>swal('Wooww!', 'Password anda berhasil diupdate!', 'success');</script>");
		} else {
			return redirect('password')->with('message', "<script>swal('Ooops!', 'Password lama anda tidak cocok dengan database!', 'error');</script>");
		}
	}

	public function image(Request $request)
	{
		User::where('email', Session::get('email'))->update([
			'image' => $request->image,
		]);

		return redirect('profile')->with('message', "<script>swal('Wooww!', 'Image anda berhasil diupdate!', 'success');</script>");
	}
}
