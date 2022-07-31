<?php

namespace App\Http\Controllers;

use App\Models\Absensi;
use Illuminate\Support\Facades\Session;
use App\Models\DataPengurus;
use App\Models\Acara;
use App\Models\Oprec;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function admin()
    {
        $user = auth()->user();
        if ($user !== null && $user->role == 1) {
            return $this->dashboard();
        } else {
            return redirect('/login');
        }
    }

    public function dashboard()
    {
        $data = [
            "data_user" => DataPengurus::count(),
            "data_acara" => Acara::count(),
            "data_oprec" => Oprec::count(),
            "data_absen" => Absensi::count()
        ];
        return view('admin.dashboard', $data);
    }

    public function datauser()
    {
        $data = [
            "data_user" => DataPengurus::all()
        ];
        return view('admin.user.datauser', $data);
    }

    public function tambahuser()
    {
        return view('admin.user.tambahuser');
    }

    public function kepengurusan()
    {
        return view("admin.pengurus.kepengurusan");
    }

    public function absensi()
    {
        return view("admin.absen.absensi");
    }

    public function oprec()
    {
        $data = Oprec::all();
        return view('admin.oprec', compact('data'));
    }

    public function event()
    {
        return view("admin.event");
    }
}
