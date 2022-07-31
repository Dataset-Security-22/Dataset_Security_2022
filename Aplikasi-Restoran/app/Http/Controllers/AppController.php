<?php

namespace App\Http\Controllers;

use App\Models\BookingMeja;
use App\Models\DetailOrder;
use App\Models\Masakan;
use App\Models\Meja;
use App\Models\Menu;
use App\Models\Order;
use App\Models\Pesanan;
use App\Models\Transaksi;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AppController extends Controller
{
    public function layouts() {
        return view("content.layouts");
    }

    public function simpan_transaksi(Request $request)
    {
        Transaksi::create([
            "id_user" => Auth::user()->id,
            "id_order" => $request->id_order,
            "nama_pembeli" => $request->nama_pembeli,
            "tanggal" => date("Y-m-d"),
            "harga_makan" => $request->harga_makan,
            "bayar" => $request->bayar,
            "status_transaksi" => "Lunas"
        ]);

        return redirect("/order");
    }

    public function pesan_makan()
    {
        $data["data_masakan"] = Masakan::where("status_masakan", 1)->get();

        return view("content.pesan.data_pesanan_makanan", $data);
    }

    public function detail_data_masakan($id)
    {
        $data["detail"] = Masakan::where("id", $id)->first();

        return view("content.pesan.detail_data_masakan", $data);
    }

    public function simpan_data_pesanan_makan(Request $request)
    {
        $harga_masakan = Masakan::  where("id", $request->id_masakan)->first();
        $harga = $harga_masakan->harga;
        $total = $harga * $request->qty;

        Pesanan::create([
            "id_order" => $request->id_order,
            "id_masakan" => $request->id_masakan,
            "qty" => $request->qty,
            "harga" => $harga,
            "total" => $total
        ]);

        $stok_masakan = Masakan::where("id", $request->id_masakan)->first();
        $stok = $stok_masakan->stok_masakan;
        $stok_masakan->stok_masakan = $stok - $request->qty;
        $stok_masakan->update();

        return redirect("/order");
    }

    public function data_pesan()
    {
        $data["data_pesan"] = Pesanan::get();

        return view("content.pesan.data_pesan", $data);
    }

    public function meja()
    {
        $data["data_meja"] = Meja::get();

        return view("content.meja.data_meja", $data);
    }

    public function booking_meja($id)
    {
        $data["edit"] = Meja::where("id", $id)->first();
        $data["data_booking"] = BookingMeja::where("id_meja", $id)->get();

        return view("content.meja.booking_meja", $data);
    }

    public function simpan_data_booking(Request $request)
    {
        BookingMeja::create([
            "id_user" => Auth::user()->id,
            "id_meja" => $request->id_meja,
            "nama_pemesan" => $request->nama_pemesan,
            "no_hp" => $request->no_hp,
            "alamat" => $request->alamat,
            "tanggal_booking" => date("Y-m-d")
        ]);

        return redirect()->back()->with("sukses", "Data Berhasil di Berhasil");
    }

    public function edit_data_booking($id)
    {
        $data["edit"] = Meja::where("id", $id)->first();
        $data["data_booking"] = BookingMeja::where("id_meja", $id)->get();
        $data["edit"] = BookingMeja::where("id", $id)->first();

        if (!$data["edit"]) {
            return redirect()->back()->with("error", "Data Tidak Ada");
        }

        return view("content.meja.update_data_booking", $data);
    }

    public function update_data_booking(Request $request)
    {
        BookingMeja::where("id", $request->id)->update([
            "id_meja" => $request->id_meja,
            "nama_pemesan" => $request->nama_pemesan,
            "no_hp" => $request->no_hp,
            "alamat" => $request->alamat,
            "tanggal_booking" => $request->tanggal_booking
        ]);

        return redirect()->back()->with("sukses", "Data Berhasil di Update");
    }

    public function hapus_data_booking($id)
    {
        BookingMeja::where("id", $id)->delete();

        return redirect()->back()->with("sukses", "Data Berhasil di Delete");
    }

    public function simpan_data_meja(Request $request)
    {
        Meja::create($request->all());

        return redirect()->back()->with("sukses", "Data Berhasil di Inputkan");
    }

    public function edit_data_meja($id)
    {
        $data["data_meja"] = Meja::where("id", "!=", $id)->get();
        $data["edit"] = Meja::where("id", $id)->first();

        if (!$data["edit"]) {
            return redirect()->back()->with("error", "Data Tidak Ada");
        }

        return view("content.meja.update_data_meja", $data);
    }

    public function update_data_meja(Request $request)
    {
        Meja::where("id", $request->id)->update([
            "kode_meja" => $request->kode_meja,
            "status_meja" => $request->status_meja
        ]);


        return redirect()->back()->with("sukses", "Data Berhasil di Update");
    }

    public function hapus_data_meja($id)
    {
        Meja::where("id", $id)->delete();

        return redirect()->back()->with("sukses", "Data Berhasil di Delete");
    }

    public function masakan()
    {
        $data["data_masakan"] = Masakan::get();

        return view("content.masakan.data_masakan", $data);
    }

    public function edit_data_masakan($id)
    {
        $data["data_masakan"] = Masakan::where("id", "!=", $id)->get();
        $data["edit"] = Masakan::where("id", $id)->first();

        if (!$data["edit"]) {
            return redirect()->back()->with("error", "Data Tidak Ada");
        }

        return view("content.masakan.update_data_masakan", $data);
    }

    public function update_data_masakan(Request $request)
    {
        Masakan::where("id", $request->id)->update([
            "nama_masakan" => $request->nama_masakan,
            "harga" => $request->harga,
            "status_masakan" => $request->status_masakan,
            "stok_masakan" => $request->stok_masakan
        ]);

        return redirect()->back()->with("sukses", "Data Berhasil di Update");
    }

    public function hapus_data_masakan($id)
    {
        Masakan::where("id", $id)->delete();

        return redirect()->back()->with("sukses", "Data Berhasil di Hapus");
    }

    public function users()
    {
        $data["data_users"] = User::get();

        return view("content.users.data_users", $data);
    }

    public function simpan_data_users(Request $request)
    {
        User::create([
            "username" => $request->username,
            "password" => bcrypt($request->password),
            "nama_user" => $request->nama_user,
            "level" => $request->level
        ]);

        return redirect()->back()->with("sukses", "Data Berhasil di Inputkan");
    }

    public function simpan_data_masakan(Request $request)
    {
        Masakan::create($request->all());

        return redirect()->back()->with("sukses", "Data Berhasil di Inputkan");
    }

    public function order()
    {
        $data["data_meja"] = Meja::where("status_meja", 3)->get();
        $data["data_order"] = Order::get();

        return view("content.order.data_order_pesanan", $data);
    }

    public function status_disajikan($id)
    {
        Order::where("id", $id)->update([
            "status_order" => 2
        ]);

        return redirect()->back()->with("sukses", "Data Berhasil di Update");
    }

    public function status_terpesan($id)
    {
        Order::where("id", $id)->update([
            "status_order" => 1
        ]);

        return redirect()->back()->with("sukses", "Data Berhasil di Update");
    }

    public function simpan_data_order_pesanan(Request $request)
    {
        Order::create([
            "id_meja" => $request->id_meja,
            "tanggal" => date("Y-m-d"),
            "id_user" => Auth::user()->id,
            "keterangan" => $request->keterangan,
            "status_order" => $request->status_order
        ]);

        return redirect()->back()->with("sukses", "Data Berhasil di Inputkan");
    }

    public function data_pesanan()
    {
        $data["data_pesanan"] = Pesanan::get();

        return view("content.pesanan.data_pesanan", $data);
    }

    public function simpan_data_pesanan(Request $request)
    {
        $harga_masakan = Masakan::  where("id", $request->id_masakan)->first();
        $harga = $harga_masakan->harga;
        $total = $harga * $request->qty;

        Pesanan::create([
            "id_masakan" => $request->id_masakan,
            "qty" => $request->qty,
            "harga" => $harga,
            "total" => $total
        ]);

        return redirect("/data_pesanan");
    }

    public function edit_data_order($id)
    {
        $data["data_meja"] = Meja::get();
        $data["data_order"] = Order::where("id", "!=", $id)->get();
        $data["edit"] = Order::where("id", $id)->first();

        if (!$data["edit"]) {
            return redirect()->back();
        }

        return view("content.order.update_data_order", $data);
    }

    public function update_data_order_pesanan(Request $request)
    {
        Order::where("id", $request->id)->update([
            "id_meja" => $request->id_meja,
            "tanggal" => $request->tanggal,
            "keterangan" => $request->keterangan,
            "status_order" => $request->status_order
        ]);

        return redirect()->back()->with("sukses", "Data Berhasil di Update");
    }

    public function hapus_data_order($id)
    {
        Order::where("id", $id)->update();

        return redirect()->back()->with("sukses", "Data Berhasil di Hapus");
    }

    public function detail_data_order($id)
    {
        $data["data_order"] = Order::where("id", "!=", $id)->get();
        $data["edit"] = Order::where("id", $id)->first();
        $data["data_masakan"] = Masakan::where("status_masakan", 1)->get();

        if (!$data["edit"]) {
            return redirect()->back()->with("error", "Data Tidak Ada");
        }

        return view("content.order.detail_data_order", $data);
    }

    public function simpan_detail_order(Request $request)
    {
        $harga_masakan = Masakan::where("id", $request->id_masakan)->first();
        $satuan_harga = $harga_masakan->harga;
        $harga_terakhir = $satuan_harga * $request->stok_order;

        DetailOrder::create([
            "id_order" => $request->id_order,
            "id_masakan" => $request->id_masakan,
            "stok_order" => $request->stok_order,
            "total_harga" => $satuan_harga
        ]);

        $myharga = Masakan::where("id", $request->id_masakan)->first();
        $myharga2 = $myharga->stok_masakan;
        $myharga->stok_masakan = $myharga2 - $request->stok_order;
        $myharga->update();

        return redirect()->back()->with("sukses", "Data Berhasil di Inputkan");
    }

    public function data_transaksi()
    {
        $data["data_transaksi"] = Transaksi::get();

        return view("content.transaksi.tampilan_transaksi", $data);
    }

    public function transaksi($id)
    {
        $data["data_order"] = Order::where("id", "!=", $id)->get();
        $data["edit"] = Order::where("id", $id)->first();
        $data["data_masakan"] = Masakan::where("status_masakan", 1)->get();
        $data["data_pesanan"] = Pesanan::where("id", $id)->first();

        if (!$data["edit"]) {
            return redirect()->back()->with("error", "Data Tidak Ada");
        }

        return view("content.transaksi.data_transaksi", $data);
    }

    public function simpan_data_transaksi(Request $request)
    {
        Transaksi::create([
            "id_user" => Auth::user()->id,
            "id_order" => $request->id_order,
            "tanggal" => date("Y-m-d"),
            "harga_makan" => $request->harga_makan,
            "bayar" => $request->bayar,
            "status_transaksi" => "Lunas"
        ]);

        return redirect()->back()->with("sukses", "Data Berhasil di Inputkan");
    }

    public function menu() {
        $data["data_menu"] = menu::get();

        return view("content.menu", $data);
    }

    public function tambah(Request $request) {
        menu::create($request->all());

        return redirect("/menu");
    }

    public function edit_menu($id) {
        $data["data_masakan"] = menu::where("id", "!=", $id)->get();
        $data["edit"] = menu::where("id", $id)->first();

        if (!$data["edit"]) {
            return redirect()->back();
        }

        return view("content.edit_menu", $data);
    }

    public function simpan_edit(Request $request) {
        Menu::where("id", $request->id)->update([
            "tanggal" => $request->tanggal,
            "waktu" => $request->waktu,
            "nama_menu" => $request->nama_menu,
            "alamat" => $request->alamat,
            "phone" => $request->phone,
            "status" => $request->status
        ]);

        return redirect("/menu/$request->id/edit_menu");
    }

    public function delete_menu($id) {
        menu::where("id", $id)->delete();

        return redirect("/menu");
    }

    public function register() {
        $data["data_login"] = User::get();

        return view("content.register", $data);
    }

    public function simpan_register(Request $request) {
        User::create([
            "email" => $request->email,
            "password" => bcrypt($request->password)
        ]);

        return redirect("/register");
    }

    public function edit_data_login($id) {
        $data["data_login"] = User::where("id", "!=", $id)->get();
        $data["edit"] = User::where("id",$id)->first();

        if (!$data["edit"]) {
            return redirect()->back();
        }

        return view("content.edit_data_login", $data);
    }

    public function update_register(Request $request) {
        User::where("id", $request->id)->update([
            "email" => $request->email,
            "password" => bcrypt($request->password)
        ]);

        return redirect("/register");
    }

    public function delete_data_login($id) {
        User::where("id", $id)->delete();

        return redirect("/register");
    }

    public function signin(Request $request) {
        if (Auth::attempt(["username" => $request->username, "password" => $request->password])) {
            return redirect()->intended("/dashboard");
        } else {
            return redirect("/");
        }
    }

    public function logout() {
        Auth::logout();

        return redirect("/");
    }
}
