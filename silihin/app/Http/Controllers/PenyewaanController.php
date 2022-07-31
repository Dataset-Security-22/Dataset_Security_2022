<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

use App\Models\Pesanan;

class PenyewaanController extends Controller
{
    public function index()
    {
        return view('penyewaan.index');
    }

    public function showall()
    {
        // dd(Session::get('logged_in')['id']);
        $pesanan = Pesanan::where('id_penyewa', Session::get('logged_in')['id'])
                            ->get();

        $data = array();

        foreach ($pesanan as $p) {
            if ($p->perstujuan == 2) {
                
            } else {
                $data[] = array(
                    'id_kendaraan' => $p->id_kendaraan,
                    'invoice' => $p->invoice,
                    'nama' => $p->peminjam->nama_lengkap,
                    'total' => 'Rp. '.rupiah($p->kendaraan->harga * $p->hari),
                    'kendaraan' => $p->kendaraan->nama_kendaraan,
                    'tujuan' => $p->dari.' - '. $p->tujuan,
                    'telepon' => $p->peminjam->telepon,
                    'persetujuan' => $p->persetujuan
                );
            }
        }

        return response()->json($data);
    }
}
