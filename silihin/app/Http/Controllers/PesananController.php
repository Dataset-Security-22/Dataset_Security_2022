<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

use App\Models\Pesanan;
use App\Models\Kendaraan;

class PesananController extends Controller
{
    public function index()
    {
        return view('pesanan.index');
    }

    public function store(Request $request)
    {
        $pesanan = Pesanan::where('invoice', $request->invoice)->first();

        if ($pesanan) {
            if ($pesanan->persetujuan != 1) {
                $kendaraan = Kendaraan::where('id', $pesanan->id_kendaraan)->first();
                if (Session::get('logged_in')['id'] == $kendaraan->user->id) {
                    if ($pesanan->kendaraan->id_user == $kendaraan->user->id) {
                        $cek = Pesanan::where('invoice', $pesanan->invoice)->update([
                            'persetujuan' => 1
                        ]);

                        Kendaraan::where('id', $kendaraan->id)->update([
                            'jumlah' => $kendaraan->jumlah - 1,
                        ]);

                        if ($cek) {
                            echo 1;
                        } else {
                            echo 3;
                        }
                    } else {
                        echo 3;
                    }
                } else {
                    echo 3;
                }
            } else {
                echo 2; 
            } 
        } else {
            echo 3;
        }

    }

    public function getAllPemilik()
    {
        $kendaraan = Kendaraan::where('id_user', Session::get('logged_in')['id'])->get();

        $data = array();

        foreach ($kendaraan as $k) {
            $pesanan = Pesanan::where('id_kendaraan', $k->id)->get();

            foreach ($pesanan as $p) {
                $data[] = array(
                    'invoice' => $p->invoice,
                    'penyewa' => $p->user->nama_lengkap,
                    'kendaraan' => $p->kendaraan->nama_kendaraan,
                    'telepon' => $p->user->telepon
                );
            }
        }

        return response()->json($data);
    }
}
