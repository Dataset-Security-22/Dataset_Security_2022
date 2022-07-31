<?php

namespace App\Http\Controllers;

use App\Models\Pelanggan;
use Illuminate\Http\Request;

class TransaksiController extends Controller
{
    public function data_transaksi()
    {
    	$data["data_pelanggan"] = Pelanggan::get();

    	return view("content.transaksi.data_transaksi", $data);
    }

    public function detail_trans($id)
    {
    	$data["detail"] = Pelanggan::where("id", $id)->first();

    	return view("content.transaksi.detail_trans", $data);
    }
}
