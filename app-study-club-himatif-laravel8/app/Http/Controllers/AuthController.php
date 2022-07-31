<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;

use \App\Models\Category;
use \App\Models\User;


class AuthController extends Controller
{
	public function index()
	{
		$data = [
			'title' => "Login"
		];
		return view('auth/login', compact('data'));
	}

	public function register()
	{
		$data = [
			'title' => "Register",
			'category' => Category::all()
		];
		return view('auth/register', compact('data'));
	}

	public function login(Request $request)
	{
		$request->validate([
			'email' => 'required',
			'password' => 'required|min:6',
		]);

		$data = User::where('email', $request->email)->first();
		
		if ($data) {
			if (Hash::check($request->password, $data->password)) {
				Session::put('email', $data->email);
				Session::put('id_role', $data->id_role);

				session('email', $data->email);

				return redirect('/dashboard');
			} else {
				return redirect('/')->with('message', "<script>Swal.fire('Ooops!', 'Password tidak cocok, harap periksa kembali!', 'error');</script>")->withInput();
			}
		}  else {
			return redirect('/')->with('message', "<script>Swal.fire('Ooops!', 'Email dan password tidak cocok, harap periksa kembali!', 'error');</script>")->withInput();
		}
	}

	public function store(Request $request)
	{
		$request->validate([
			'email' => 'required|unique:users,email',
			'password' => 'required|min:6',
			'category' => 'required',
		]);

		User::create([
			'id_class' => 1,
			'email' => $request->email,
			'password' => Hash::make($request->password),
			'id_role' => 3,
			'id_category' => $request->category,
		]);

		return redirect('/')->with('message', "<script>Swal.fire('Selamat!', 'Selamat registrasi berhasil!', 'success');</script>");
	}

	public function logout()
	{
		Session::flush();
		return redirect('/');
	}
}
