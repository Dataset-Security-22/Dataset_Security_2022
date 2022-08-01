<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Order;
use App\Models\FotoSyarat;
use App\Models\DeskripsiRumah;


class ValidasiTransaksiController extends Controller
{
    public function index()
    {
        $data = [
            // "deskripsi" => Transaction::where('id_user', Auth::user()->id)->get()
            "validasiTransaksi" => Order::where('id_owner', Auth::user()->id)->get(),
        ];

        return view("owner.Transaksi.index", $data);
    }


    public function hapus(Request $request)
    {
        Order::where("id", $request->id)->delete();
        DeskripsiRumah::where('id', $request->id)->update([
            "stock" => $request->stock + 1,
        ]);


        // 'stock' => $deskripsi_rumah->stock - 1,

        return redirect()->back()->with("message", "<script>Swal.fire('Berhasil', 'Data Berhasil di Hapus', 'success')</script>");
    }

    public function edit(Request $request)
    {
        $data = [
            "edit" => Order::where("id", $request->id)->first(),
        ];

        return view("owner.transaksi.edit_transaksi", $data);
    }


    public function simpan(Request $request)
    {
        Order::where("id", $request->id)->update([
            "validasi" => $request->validasi,
        ]);

        // Perumahan::create([
        //     "stock_baru" => $request->validasi,
        // ]);


        return redirect("/owner/transaksi/index")->with(["message" => "<script>Swal.fire('Berhasil', 'Data Berhasil di update', 'success');</script>"]);
    }


}





