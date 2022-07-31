<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

use App\Models\User;

class ProfileController extends Controller
{
    public function getUser()
    {
        $user = User::where('email', Session::get('logged_in')['email'])->first();
        return $user;
    }

    public function index()
    {   
        $user = $this->getUser();
        return view('profile.index', compact('user'));
    }

    public function profileUpdate(Request $request)
    {
        if ($this->getUser()) {
            if ($request->hasFile('image')) {
                $slug = preg_replace('/[^a-z0-9]+/i', '-', trim(strtolower($request->nama)));
                $extension = $request->image->extension();
                $image = time()."_".$slug.".".$extension;
                $request->image->storeAs('public/'.(md5($this->getUser()->id).'/profile/'), $image);
                if ($request->file('image')->isValid()) {
                    $cek = User::where("email", $this->getUser()->email)->update([
                        'nama_lengkap' => $request->nama_lengkap,
                        'telepon' => handphone($request->telepon),
                        'alamat' => $request->alamat,
                        'image' => md5($this->getUser()->id).'/profile/'.$image,
                    ]);

                    if ($cek) {
                        return redirect()->back()->with("message2", '<div class="alert alert-success"><a href="#" class="close" data-dismiss="alert">×</a><strong>Wooww!</strong> Data berhasil disimpan.</div>');
                    } else {
                        return redirect()->back()->with("message2", '<div class="alert alert-danger"><a href="#" class="close" data-dismiss="alert">×</a><strong>Ooops!</strong> Ada kesalahan saat menyimpan data.</div>');
                    }
                } else {
                    return redirect()->back()->with("message2", '<div class="alert alert-danger"><a href="#" class="close" data-dismiss="alert">×</a><strong>Ooops!</strong> Ada kesalahan saat menyimpan data.</div>');
                }
            } else {
                $cek = User::where("email", $this->getUser()->email)->update([
                    'nama_lengkap' => $request->nama_lengkap,
                    'telepon' => handphone($request->telepon),
                    'alamat' => $request->alamat
                ]);

                if ($cek) {
                    return redirect()->back()->with("message2", '<div class="alert alert-success"><a href="#" class="close" data-dismiss="alert">×</a><strong>Wooww!</strong> Data berhasil disimpan.</div>');
                } else {
                    return redirect()->back()->with("message2", '<div class="alert alert-danger"><a href="#" class="close" data-dismiss="alert">×</a><strong>Ooops!</strong> Ada kesalahan saat menyimpan data.</div>');
                }
            }
        }
    }

    public function teleponUpdate(Request $request)
    {
        if ($this->getUser()) {
            $cek = User::where('email', $this->getUser()->email)->update([
                'telepon' => handphone($request->telepon),
                'alamat' => $request->alamat
            ]);

            if ($cek) {
                echo 1;
            } else {
                echo 2;
            }
        }
    }
}
