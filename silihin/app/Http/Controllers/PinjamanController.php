<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

use App\Models\User;
use App\Models\Pesanan;
use App\Models\Kendaraan;

class PinjamanController extends Controller
{
    public function index()
    {
        return view('pinjaman.index');
    }

    public function showAll()
    {
        $data = array();
        // dd(Session::get('logged_in')['id']);
        $pesanan = Pesanan::where('id_peminjam', Session::get('logged_in')['id'])
                        // ->orwhere('persetujuan', NULL)
                        // ->where('persetujuan', 1)
                        // ->where('selesai', null)
                        ->get();

        foreach ($pesanan as $p) {
            if ($p->persetujuan == null) {
                $data[] = array(
                    'id_kendaraan' => $p->id_kendaraan,
                    'invoice' => $p->invoice,
                    'penyewa' => $p->penyewa->nama_lengkap,
                    'kendaraan' => $p->kendaraan->nama_kendaraan,
                    'total' => 'Rp. '.rupiah($p->kendaraan->harga * $p->hari),
                    'telepon' => $p->penyewa->telepon,
                    'tujuan' => $p->dari.' - '. $p->tujuan,
                    'persetujuan' => $p->persetujuan,
                    'selesai' => $p->selesai
                );
            } elseif ($p->persetujuan == 1 && $p->selesai == 1) {
                
            } elseif ($p->persetujuan == 2) {
                
            } elseif ($p->selesai == null) {
                $data[] = array(
                    'id_kendaraan' => $p->id_kendaraan,
                    'invoice' => $p->invoice,
                    'penyewa' => $p->penyewa->nama_lengkap,
                    'kendaraan' => $p->kendaraan->nama_kendaraan,
                    'total' => 'Rp. '.rupiah($p->kendaraan->harga * $p->hari),
                    'telepon' => $p->penyewa->telepon,
                    'tujuan' => $p->dari.' - '. $p->tujuan,
                    'persetujuan' => $p->persetujuan,
                    'selesai' => $p->selesai
                );
            }
        }

        return response()->json($data);
    }

    public function tolak(Request $request)
    {
        $cek = Pesanan::where('invoice', $request->invoice)->update(['persetujuan' => 2]);

        if ($cek) {
            $this->_backToJumlah($request->kendaraan);
            echo 1;
        } else {
            echo 2;
        }
    }

    public function tolakCount()
    {
        $kendaraan = Kendaraan::where('id_user', Session::get('logged_in')['id'])->get();

        $data = [];

        foreach ($kendaraan as $k) {
            $countPesanan = Pesanan::where('id_kendaraan', $k->id)->where('persetujuan', 2)->count();

            $data[] = [
                'kendaraan' => $k->nama_kendaraan,
                'jumlah' => $countPesanan
            ];
        }

        return response()->json($data);
    }

    public function setuju(Request $request)
    {
        $cek = Pesanan::where('invoice', $request->invoice)->update(['persetujuan' => 1]);

        if ($cek) {
            $this->_getMinJumlah($request->kendaraan);
            echo 1;
        } else {
            echo 2;
        }
    }

    public function selesai(Request $request)
    {
        $cek = Pesanan::where('invoice', $request->invoice)->update(['selesai' => 1]);

        if ($cek) {
            $this->_backToJumlah($request->kendaraan);
            echo 1;
        } else {
            echo 2;
        }
    }

    public function selesaiCount()
    {
        $kendaraan = Kendaraan::where('id_user', Session::get('logged_in')['id'])->get();

        $data = [];

        foreach ($kendaraan as $k) {
            $countPesanan = Pesanan::where('id_kendaraan', $k->id)->where('selesai', 1)->count();

            $data[] = [
                'kendaraan' => $k->nama_kendaraan,
                'jumlah' => $countPesanan
            ];
        }

        return response()->json($data);
    }

    private function _getMinJumlah($kendaraan) {
        $jumlah = Kendaraan::where('id', $kendaraan)->max('jumlah');

        Kendaraan::where('id', $kendaraan)->update([
            'jumlah' => $jumlah-1
        ]);
    }

    private function _backToJumlah($kendaraan)
    {
        $jumlah = Kendaraan::where('id', $kendaraan)->max('jumlah');

        Kendaraan::where('id', $kendaraan)->update([
            'jumlah' => $jumlah+1
        ]);
    }
}
