<?php

namespace App\Http\Controllers;

use App\Models\HakAkses;
use App\Models\Role;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use App\Models\TerakhirLogin;
use App\Models\User;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Hash;

class LoginController extends Controller
{
    public function login()
    {
        $role = Role::orderBy('id', 'DESC')->get();
        return view("app.auth.v_login", compact('role'));
    }

    public function hakAkses(Request $request)
    {
        $request->validate([
            'id_hak_akses' => 'required',
        ]);

        $cek = User::where('id', Auth::user()->id)->update([
            'id_hak_akses' => $request->id_hak_akses,
        ]);

        if ($cek) {
            return back();
        } else {
            return back()->with('message', "<script>Swal.fire('Ooops!', 'Maaf anda belum mendapatkan akses, harap hubungi Admin Pusat!', 'error');</script>")->withInput();
        }
    }

    public function changeHakAkses(Request $request, $id)
    {
        $cek = User::where('id', Auth::user()->id)->update([
            'id_hak_akses' => $id,
        ]);

        if ($cek) {
            echo 1;
        } else {
            echo 2;
        }
    }

    public function loginProses(Request $request)
    {
        $validasi = $request->validate([
            'no_hp' => 'required',
            'password' => 'required'
        ]);

        $user = User::where('no_hp', $request->no_hp)->first();

        if ($user) {
            if ($user->status == 1) {

                if (Hash::check($request->password, $user->password)) {

                    TerakhirLogin::create([
                        "nama" => $user->nama,
                        "id_user" => $user->id
                    ]);

                    Session::put("id", $user->id);
                    Session::put("nama", $user->nama);
                    Session::put("email", $user->email);
                    Session::put("id_hak_akses", $user->id_hak_akses);
                    Session::put("role", $user->getAkses->getRole->keterangan);
                    Session::put("id_role", $user->getAkses->getRole->id);
                    Session::put("login", TRUE);

                    session('email', $user->email);

                    return redirect("/app/sistem/home");
                } else {
                    return back()->with('message', "<script>Swal.fire('Ooops!', 'No telepon dan password tidak cocok, harap periksa kembali!', 'error');</script>")->withInput();
                }
            } else {
                return back()->with('message', "<script>Swal.fire('Ooops!', 'Maaf anda belum mendapatkan akses, harap hubungi Admin Pusat!', 'error');</script>")->withInput();
            }
        } else {
            return back()->with('message', "<script>Swal.fire('Ooops!', 'No telepon dan password tidak cocok, harap periksa kembali!', 'error');</script>")->withInput();
        }
    }

    public function logout()
    {
        Session::flush();

        return redirect('app/login');
    }
}
