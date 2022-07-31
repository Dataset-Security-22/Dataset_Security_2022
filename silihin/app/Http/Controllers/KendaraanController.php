<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Storage;

use App\Models\User;
use App\Models\Pesanan;
use App\Models\Kendaraan;

class KendaraanController extends Controller
{
    public function index()
    {
        return view('kendaraan.index');
    }

    public function store(Request $request)
    {
        $user = User::where('email', Session::get('logged_in')['email'])->first();

        $request->validate([
            'nama' => 'required',
            'harga' => 'required',
            'jumlah' => 'required',
            'keterangan' => 'required',
            'gambar' => 'required'
        ]);

        if ($request->hasFile('gambar')) {
            $slug = preg_replace('/[^a-z0-9]+/i', '-', trim(strtolower($request->nama)));
            $extension = $request->gambar->extension();
            $gambar = time()."_".$slug.".".$extension;
            $request->gambar->storeAs('public/'.(md5($user->id).'/kendaraan/'), $gambar);
            if ($request->file('gambar')->isValid()) {
                Kendaraan::create([
                    'id_user' => $user->id,
                    'nama_kendaraan' => $request->nama,
                    'harga' => $request->harga,
                    'jumlah' => $request->jumlah,
                    'keterangan' => $request->keterangan,
                    'gambar' => md5($user->id).'/kendaraan/'.$gambar,
                ]);
                return redirect('/kendaraan')->with("message2", '<div class="alert alert-success"><a href="#" class="close" data-dismiss="alert">×</a><strong>Wooww!</strong> Data berhasil ditambahkan.</div>');
            } else {
                return redirect('/kendaraan')->with("message2", '<div class="alert alert-danger"><a href="#" class="close" data-dismiss="alert">×</a><strong>Ooops!</strong> Ada kesalahan saat menyimpan data.</div>');
            }
        } else {
            return redirect('/kendaraan')->with("message2", '<div class="alert alert-danger"><a href="#" class="close" data-dismiss="alert">×</a><strong>Ooops!</strong> Gagal menyimpan data.</div>');
        }
    }

    public function edit($id)
    {
        $kendaraan = Kendaraan::find($id);

        return response()->json([
            'data' => $kendaraan
        ]);
    }


    public function update(Request $request, $id)
    {
        $user = User::where('email', Session::get('logged_in')['email'])->first();

        $request->validate([
            'edit_nama' => 'required',
            'edit_harga' => 'required',
            'edit_jumlah' => 'required',
            'edit_keterangan' => 'required',
        ]);

        $kendaraan = Kendaraan::find($id);

        if ($request->hasFile('edit_gambar')) {
            $slug = preg_replace('/[^a-z0-9]+/i', '-', trim(strtolower($request->edit_nama)));
            $extension = $request->edit_gambar->extension();
            $edit_gambar = time()."_".$slug.".".$extension;
            $request->edit_gambar->storeAs('public/'.(md5($user->nama_lengkap).'/kendaraan/'), $edit_gambar);
            if ($request->file('edit_gambar')->isValid()) {
                Storage::delete('/public/'.$kendaraan->gambar);
                Kendaraan::where('id', $id)->update([
                    'nama_kendaraan' => $request->edit_nama,
                    'harga' => $request->edit_harga,
                    'jumlah' => $request->edit_jumlah,
                    'keterangan' => $request->edit_keterangan,
                    'gambar' => md5($user->nama_lengkap).'/kendaraan/'.$edit_gambar,
                ]);
                return redirect('/kendaraan')->with("message2", '<div class="alert alert-success"><a href="#" class="close" data-dismiss="alert">×</a><strong>Wooww!</strong> Data berhasil diubah.</div>');
            } else {
                return redirect('/kendaraan')->with("message2", '<div class="alert alert-danger"><a href="#" class="close" data-dismiss="alert">×</a><strong>Ooops!</strong> Ada kesalahan saat menyimpan data.</div>');
            }
        } else {
            Kendaraan::where('id', $id)->update([
                'nama_kendaraan' => $request->edit_nama,
                'harga' => $request->edit_harga,
                'jumlah' => $request->edit_jumlah,
                'keterangan' => $request->edit_keterangan,
            ]);
            return redirect('/kendaraan')->with("message2", '<div class="alert alert-success"><a href="#" class="close" data-dismiss="alert">×</a><strong>Wooww!</strong> Data berhasil diubah.</div>');
        }
    }

    public function pesan(Request $request, $id, $invoice)
    {
        $kendaraan = Kendaraan::where('id', $id)->first();
        $invoice2 = Pesanan::where('invoice', $invoice)->first();
        $invoice3 = '';

        if ($invoice2) {
            $invoice3 = mt_rand(10000000,99999999);
        } else {
            $invoice3 = $invoice;
        }

        $cek = Pesanan::create([
            'id_peminjam' => $kendaraan->id_user,
            'id_penyewa' => Session::get('logged_in')['id'],
            'id_kendaraan' => $kendaraan->id,
            'dari' => $request->dari,
            'tujuan' => $request->tujuan,
            'invoice' => $invoice3,
            'hari' => $request->hari
        ]);

        if ($cek) {
            echo 1;
        } else {
            echo 2;
        }

        // WaSend($kendaraan->user->telepon, Session::get('logged_in')['nama_lengkap'], $invoice3, $kendaraan->nama_kendaraan, rupiah($kendaraan->harga), $request->dari, $request->tujuan, $request->hari);
    }


    public function destroy($id)
    {
        $kendaraan = Kendaraan::where('id', $id)->first();

        Storage::delete('/public/'.$kendaraan->gambar);
        $cek = Kendaraan::destroy($kendaraan->id);

        if ($cek) {
            echo 1;
        } else {
            echo 2;
        }
    }

    public function getByKendaraanUser()
    {
        $user = User::where('email', Session::get('logged_in')['email'])->first();
        $kendaraan = Kendaraan::where('id_user', $user->id)->get();
        return view('kendaraan.view', compact('kendaraan', 'user'));
    }
}
