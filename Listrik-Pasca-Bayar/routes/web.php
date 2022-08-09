<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\PelangganController;
use App\Http\Controllers\PembayaranController;
use App\Http\Controllers\PenggunaanController;
use App\Http\Controllers\PetugasController;
use App\Http\Controllers\TagihanController;
use App\Http\Controllers\TarifController;
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
    Route::get("/", function() {
        return view("content.dashboard");
    });

    Route::get("/dashboard", [AdminController::class, "dashboard"]);

    // Data Tarif
    Route::get("/tarif", [TarifController::class, "data_tarif"]);
    Route::post("/tarif", [TarifController::class, "post_tarif"]);
    Route::get("/tarif/{id}/hapus", [TarifController::class, "hapus_tarif"]);
    Route::get("/tarif/edit", [TarifController::class, "edit_tarif"]);
    Route::put("/tarif", [TarifController::class, "put_tarif"]);

    // Data Pelanggan
    Route::get("/pelanggan", [PelangganController::class, "data_pelanggan"]);
    Route::post("/pelanggan", [PelangganController::class, "post_pelanggan"]);
    Route::get("/pelanggan/{id_pelanggan}/hapus", [PelangganController::class, "hapus_pelanggan"]);
    Route::get("/pelanggan/edit", [PelangganController::class, "edit_pelanggan"]);
    Route::put("/pelanggan", [PelangganController::class, "put_pelanggan"]);

    // Data Petugas
    Route::get("/petugas", [PetugasController::class, "data_petugas"]);
    Route::post("/petugas", [PetugasController::class, "post_petugas"]);
    Route::get("/petugas/{nik_petugas}/hapus", [PetugasController::class, "hapus_petugas"]);
    Route::get("/petugas/edit", [PetugasController::class, "edit_petugas"]);
    Route::put("/petugas", [PetugasController::class, "put_petugas"]);

    // Data Penggunaan
    Route::get("/penggunaan", [PenggunaanController::class, "data_penggunaan"]);
    Route::post("/penggunaan", [PenggunaanController::class, "post_penggunaan"]);
    Route::get("/penggunaan/{id_penggunaan}/hapus", [PenggunaanController::class, "hapus_penggunaan"]);
    Route::get("/penggunaan/edit", [PenggunaanController::class, "edit_penggunaan"]);
    Route::put("/penggunaan", [PenggunaanController::class, "put_penggunaan"]);
    Route::get("/penggunaan/{id_penggunaan}/detail", [PenggunaanController::class, "detail_penggunaan"]);
    Route::get("/tagihan-pengguna/{id_penggunaan}/lihat", [PenggunaanController::class, "lihat_data"]);
    Route::get("/tagihan-pengguna/{id_penggunaan}/detail", [PenggunaanController::class, "detail_tagihan"]);
    Route::get("/detail_data_tagihan_pengguna/{id}/detail_tagihan", [TagihanController::class, "detail_tagihan_pengguna"]);
    Route::get("/data_tagihan_pengguna", [TagihanController::class, "data_tagihan_pengguna"]);
    Route::get("/tagihan-pengguna", [TagihanController::class, "data_tagihan"]);
    Route::post("/tagihan-pengguna", [TagihanController::class, "post_tagihan"]);

    // Data Pembayaran
    Route::get("/pembayaran", [PembayaranController::class, "data_pembayaran"]);
    Route::get("/pembayaran/{id}/bayar", [PembayaranController::class, "bayar_tagihan"]);
    Route::post("/pembayaran", [PembayaranController::class, "post_pembayaran"]);
    Route::get("/pembayaran/{id}/detail-data-pembayaran", [PembayaranController::class, "detail_data_pembayaran"]);

    // Data Users
    Route::get("/users", [AdminController::class, "users"]);
    Route::post("/simpan_data_users", [AdminController::class, "simpan_data_users"]);

    Route::get("/logout", [AdminController::class, "logout"]);

});
