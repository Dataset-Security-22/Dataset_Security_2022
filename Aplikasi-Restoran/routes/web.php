<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\KategoriController;
use App\Http\Controllers\MejaController;
use App\Http\Controllers\MenuController;
use App\Http\Controllers\PesananController;
use App\Http\Controllers\TransaksiController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::group(["middleware" => ["guest"]], function() {
    Route::get("/login", [AdminController::class, "login"]);
    Route::post("/signin", [AdminController::class, "signin"]);
});

Route::group(["middleware" => ["admin"]], function() {
    Route::get("/dashboard", [AdminController::class, "dashboard"]);

    // Data Kategori
    Route::get("/kategori", [KategoriController::class, "data_kategori"]);
    Route::post("/simpan_data_kategori", [KategoriController::class, "simpan_data_kategori"]);
    Route::get("/delete_kategori/{id}/delete", [KategoriController::class, "delete_kategori"]);
    Route::get("/edit_kategori/{id}/edit", [KategoriController::class, "edit_kategori"]);
    Route::post("/update_kategori", [KategoriController::class, "update_kategori"]);

    // Data Meja
    Route::get("/meja", [MejaController::class, "data_meja"]);
    Route::post("/simpan_data_meja", [MejaController::class, "simpan_data_meja"]);
    Route::get("/delete_meja/{id}/delete", [MejaController::class, "delete_meja"]);
    Route::get("/edit_meja/{id}/edit", [MejaController::class, "edit_meja"]);
    Route::post("/update_meja", [MejaController::class, "update_meja"]);

    // Data Menu
    Route::get("/menu", [MenuController::class, "data_menu"]);
    Route::post("/simpan_data_menu", [MenuController::class, "simpan_data_menu"]);
    Route::get("/delete_menu/{id}/delete", [MenuController::class, "delete_menu"]);
    Route::get("/edit_menu/{id}/edit", [MenuController::class, "edit_menu"]);
    Route::post("/update_menu", [MenuController::class, "update_menu"]);

    // Data Pemesanan Menu
    Route::get("/pesanan_menu", [PesananController::class, "pesanan_menu"]);
    Route::get("/detail_menu/{id}/detail", [PesananController::class, "detail_menu"]);
    Route::post("/simpan_data_pesanan_menu", [PesananController::class, "simpan_data_pesanan_menu"]);
    Route::get("/data_pesanan", [PesananController::class, "data_pesanan"]);
    Route::post("/update_data_pesanan", [PesananController::class, "update_data_pesanan"]);
    Route::get("/delete_pesanan/{id}/delete", [PesananController::class, "delete"]);
    Route::get("/data_pesan_menu", [PesananController::class, "data_pesan_menu"]);
    Route::post("/simpan_data_pemesanan_menu", [PesananController::class, "simpan_data_pemesanan_menu"]);

    // Data Transaksi
    Route::get("/transaksi", [TransaksiController::class, "transaksi"]);
    Route::get("/bayar_transaksi/{id}/bayar", [TransaksiController::class, "bayar"]);
    Route::post("/simpan_data_bayar_transaksi", [TransaksiController::class, "simpan_data_bayar_transaksi"]);
    Route::get("/pembayaran_transaksi", [TransaksiController::class, "pembayaran_transaksi"]);
    Route::get("/detail_pembayaran/{id}/detail", [TransaksiController::class, "detail_pembayaran"]);

    // Data Users
    Route::get("/users", [AdminController::class, "users"]);
    Route::post("/simpan_data_users", [AdminController::class, "simpan_data_users"]);
    Route::get("/logout", [AdminController::class, "logout"]);
});
