<?php

namespace App\Http\Controllers;

use App\Models\Borrowing;
use App\Models\Employe;
use App\Models\Good;
use App\Models\Stock;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PeminjamanController extends Controller
{
    public function peminjaman() {
    	$data["data_barang"] = Good::get();
    	$data["data_karyawan"] = Employe::get();
    	$data["data_peminjaman"] = Borrowing::get();

    	return view("content.admin.peminjaman.data_peminjaman", $data);
    }

    public function tambah_peminjaman(Request $request) {
        $message = [
        "unique" => "Nama :attribute tersebut sudah ada",
        "required" => "Kolom :attribute tidak boleh kosong",
        "min" => "Kolom :attribute harus diisi minimal :min digit",
        "max" => "Kolom :attribute tidak boleh lebih dari :max digit"
        ];

        $this->validate($request, [
            "good_id" => "required",
            "employee_id" => "required",
            "end" => "required",
            "details" => "required"
            ], $message);

    	Borrowing::create([
    		"user_id" => Auth::user()->id,
    		"good_id" => $request->good_id,
    		"employee_id" => $request->employee_id,
    		"start" => date("Y-m-d"),
    		"end" => $request->end,
    		"details" => $request->details
    	]);

        $stok = Stock::where("good_id", $request->good_id)->first();
        $stok_qty = $stok->quantity;
        $stok->quantity = $stok_qty - 1;
        $stok->update();

    	 return redirect()->back()->with("sukses", "Data Berhasil di Tambah");
    }

    public function edit_peminjaman($id) {
        $data["data_barang"] = Good::get();
        $data["data_karyawan"] = Employe::get();
        $data["data_peminjaman"] = Borrowing::where("id", "!=", $id)->get();
        $data["edit"] = Borrowing::where("id", $id)->first();

        if (!$data["edit"]) {
            return redirect()->back()->with("error", "Data tidak ada");
        }

    	return view("content.admin.peminjaman.edit_peminjaman", $data);
    }

    public function update_peminjaman(Request $request) {
        $message = [
        "unique" => "Nama :attribute tersebut sudah ada",
        "required" => "Kolom :attribute tidak boleh kosong",
        "min" => "Kolom :attribute harus diisi minimal :min digit",
        "max" => "Kolom :attribute tidak boleh lebih dari :max digit"
        ];

        $this->validate($request, [
            "good_id" => "required",
            "employee_id" => "required",
            "end" => "required",
            "details" => "required"
            ], $message);

    	Borrowing::where("id", $request->id)->update([
    		"good_id" => $request->good_id,
    		"employee_id" => $request->employee_id,
    		"end" => $request->end,
    		"details" => $request->details
    	]);

    	return redirect()->back()->with("sukses", "Data Berhasil di Update");
    }

    public function hapus_peminjaman($id) {
    	Borrowing::where("id", $id)->delete();

    	return redirect()->back()->with("sukses", "Data Berhasil di Delete");
    }
}
