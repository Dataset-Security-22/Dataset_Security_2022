<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Providers\RouteServiceProvider;
use Illuminate\Support\Facades\Session;
// use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Auth;
use Hash;
use Socialite;
use App\Models\User;
use App\Models\PasswordReset;


class AuthController extends Controller
{
	// use AuthenticatesUsers;

	protected $redirectTo = RouteServiceProvider::HOME;

	public function __construct()
	{
		$this->middleware('guest')->except('logout');
	}

	public function login(Request $request)
	{
		$email = $request->email;
		$password = $request->password;

		$user = User::where('email', $email)->first();

		if ($user) {
			if ($user->google_id == null) {
				return redirect('/')->with('message', "<script>swal('Ooops', 'Harap aktivasi email terlebih dahulu!', 'error')</script>");
			} else {
				if (password_verify($password, $user->password)) {
					Session::put('logged_in', $user);
					return redirect('/')->with('message', "<script>swal('Wooww', 'Berhasil login!', 'success')</script>");
				} else {
					return redirect('/')->with('message', "<script>swal('Ooops', 'Password salah!', 'error')</script>");
				}
			}
		} else {
			return redirect('/')->with('message', "<script>swal('Ooops', 'Akun tidak terdaftar!', 'error')</script>");
		}
	}

	public function register(Request $request)
	{
		$nama_lengkap = $request->nama_lengkap;
		$email = $request->email;
		$telepon = handphone($request->telepon);
		$password = password_hash($request->password, PASSWORD_DEFAULT);
		$token = base64_encode(md5(sha1(random_bytes(10))));

		$user = User::where('email', $email)->first();

		if (empty($user)) {
			$request->validate([
				'email' => 'unique:users|email',
				'telepon' => 'required',
				'nama_lengkap' => 'required'
			]);

			PasswordReset::create([
				'email' => $email,
				'token' => $token,
				'time' => time()
			]);

			User::create([
				'nama_lengkap' => $nama_lengkap,
				'google_id' => 1,
				'email' => $email,
				'password' => $password,
				'telepon' => $telepon,
			]);

			// $this->_sendEmail($token, 'verify');

			return redirect('/')->with('message', "<script>swal('Wooww', 'Registrasi sukses, silahkan login!', 'success')</script>");
		} else {
			return redirect('/')->with('message', "<script>swal('Ooops', 'Akun sudah terdaftar!', 'error')</script>");
		}
	}

	public function verify()
	{
		$email = $_GET['email'];
		$token = $_GET['token'];

		$user = User::where('email', $email)->first();

		if ($user) {
			$user_token = PasswordReset::where('email', $email)->first();

			if ($user_token) {
				if (time() - $user_token->time < (60 * 60 * 24)) {
					User::where('email', $user->email)->update([
						'google_id' => 1
					]);

					PasswordReset::where('email', $user_token->email)->delete();

					return redirect('/')->with('message', "<script>swal('Wooww', 'Akun berhasil terverifikasi, silahkan login.', 'success')</script>");
				} else {
					return redirect('/')->with('message', "<script>swal('Ooops', 'Akun gagal verifikasi, token expired!', 'error')</script>");
				}
			} else {
				return redirect('/')->with('message', "<script>swal('Ooops', 'Akun gagal verifikasi, token salah!', 'error')</script>");
			}
		} else {
			return redirect('/')->with('message', "<script>swal('Ooops', 'Akun gagal verifikasi, email salah!', 'error')</script>");
		}
	}

	public function forgotPassword(Request $request) {
		$user = User::where('email', $request->email)->first();

		if ($user) {
			$token = base64_encode(md5(sha1(random_bytes(10))));

			PasswordReset::create([
				'email' => $user->email,
				'token' => $token,
				'time' => time()
			]);


			$this->_sendEmail($token, 'forgot');

			return redirect('/')->with('message', "<script>swal('Wooww', 'Reset password berhasil, silahkan lihat email anda.', 'success')</script>");
		} else {
			return redirect('/')->with('message', "<script>swal('Ooops', 'Email tidak terdaftar!', 'error')</script>");
		}
	}

	public function reset()
	{
		$email = $_GET['email'];
		$token = $_GET['token'];

		$user = User::where('email', $email)->first();

		if ($user) {
			$user_token = PasswordReset::where('token', $token)->first();

			if ($user_token) {
				return view('mail.reset_form', compact("user"));
			} else {
				return redirect('/')->with('message', "<script>swal('Ooops', 'Akun gagal verifikasi, token salah!', 'error')</script>");
			}
		} else {
			return redirect('/')->with('message', "<script>swal('Ooops', 'Akun gagal verifikasi, email salah!', 'error')</script>");
		}
	}

	private function _sendEmail($token, $type)
	{
		if ($type == "verify") {
			\Mail::to($_POST['email'])->send(new \App\Mail\SendMail($token));
		} elseif ($type == "forgot") {
			\Mail::to($_POST['email'])->send(new \App\Mail\Resetmail($token));
		} else {
			return redirect('/')->with('message', "<script>swal('Ooops', 'Error.', 'error')</script>");
		}
	}

	public function google()
	{
		return Socialite::driver('google')->redirect();
	}

	public function google_callback()
	{
		try {

			$user = Socialite::driver('google')->stateless()->user();

			$isUser = User::where('google_id', $user->id)->first();

			if($isUser){

				Auth::login($isUser);
				Session::put('logged_in', $isUser);
				return redirect('/');

			} else {
				$createUser = new User;
				$createUser->nama_lengkap =  $user->getName();

				if($user->getEmail() != null){
					$createUser->email = $user->getEmail();
					$createUser->email_verified_at = \Carbon\Carbon::now();
				}  

				$createUser->google_id = $user->getId();

				$rand = rand(111111,999999);
				$createUser->password = Hash::make($user->getName().$rand);

				$createUser->save();

				Auth::login($createUser);
				Session::put('logged_in', $createUser);

				return redirect('/');
			}

		} catch (Exception $exception) {
			dd($exception->getMessage());
		}
	}

	public function telepon(Request $request)
	{
		dd($request);
		$user = User::where('email', Session::get('logged_in')['email'])->first();

		if ($user) {
			$cek = User::where('id', $user->id)->update([
				'telepon' => $request->telepon
			]);

			if ($cek) {
				echo 1;
			} else {
				echo 2;
			}
		} else {
			echo 2;
		}
	}

	public function logout()
	{
		Session::flush();
		return redirect('/');
	}
}
