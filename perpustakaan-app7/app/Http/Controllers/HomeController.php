<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\BukuModel;
use App\Models\User;
use App\Models\AnggotaModel;
use App\Models\Transaksi;
use Illuminate\Support\Facades\DB;

class HomeController extends Controller
{
    public function index(){
        $data = [
            "jumlah_data_buku" => BukuModel::count(),
            "jumlah_data_user" => User::count(),
            "jumlah_data_anggota" => AnggotaModel::count(),
            "jumlah_data_transaksi" => Transaksi::count(),

            "jumlah_data_pinjam" => Transaksi::where("tanggal_mengembalikan", NULL)->count(),
            "jumlah_data_denda" => Transaksi::sum('denda')
            // "jumlah_data_kembali" => Transaksi::select("tanggal_mengembalikan")->count()
        ];

        //dd($data['jumlah_data_denda']);

        return view('v_home', $data);
    }
}
