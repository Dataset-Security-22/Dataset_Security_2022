<?php

use App\Http\Controllers\AppController;
use App\Http\Controllers\JenisServiceController;
use App\Http\Controllers\KendaraanController;
use App\Http\Controllers\MerkController;
use App\Http\Controllers\PelangganController;
use App\Http\Controllers\PemilikController;
use App\Http\Controllers\PengembalianController;
use App\Http\Controllers\PetugasController;
use App\Http\Controllers\RentalController;
use App\Http\Controllers\ServiceController;
use App\Http\Controllers\SetoranController;
use App\Http\Controllers\SopirController;
use App\Http\Controllers\TransaksiController;
use App\Http\Controllers\TypeController;
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

Route::get("/theme", function() {
    return view("content.layouts.app");
});

Route::group(["middleware" => ["guest"]], function () {
	Route::get("/login", [AppController::class, "login"]);
	Route::post("/post_login", [AppController::class, "post_login"]);
});

Route::group(["middleware" => ["admin"]], function() {
    Route::get("/dashboard", [AppController::class, "dashboard"]);

    // Data Type
    Route::get("/type", [TypeController::class, "data_type"]);
    Route::post("/simpan_data_type", [TypeController::class, "simpan_data_type"]);
    Route::get("/edit_type", [TypeController::class, "edit_type"]);
    Route::post("/update_data_type", [TypeController::class, "update_data_type"]);
    Route::get("/type/{id_type}/delete", [TypeController::class, "delete_data_type"]);

    // Data Merk
    Route::get("/merk", [MerkController::class, "data_merk"]);
    Route::post("/simpan_data_merk", [MerkController::class, "simpan_data_merk"]);
    Route::get("/edit_merk", [MerkController::class, "edit_merk"]);
    Route::post("/update_data_merk", [MerkController::class, "update_data_merk"]);
    Route::get("/merk/{kode_merk}/delete", [MerkController::class, "delete_data_merk"]);

    // Data Petugas
    Route::get("/petugas", [PetugasController::class, "data_petugas"]);
    Route::post("/simpan_data_petugas", [PetugasController::class, "simpan_data_petugas"]);
    Route::get("/edit_petugas", [PetugasController::class, "edit_petugas"]);
    Route::post("/update_data_petugas", [PetugasController::class, "update_data_petugas"]);
    Route::get("/petugas/{nik}/delete", [PetugasController::class, "delete_data_petugas"]);

    // Data Sopir
    Route::get("/sopir", [SopirController::class, "data_sopir"]);
    Route::post("/simpan_data_sopir", [SopirController::class, "simpan_data_sopir"]);
    Route::get("/edit_sopir", [SopirController::class, "edit_sopir"]);
    Route::post("/update_data_sopir", [SopirController::class, "update_data_sopir"]);
    Route::get("/sopir/{id_sopir}/delete", [SopirController::class, "delete_data_sopir"]);

    // Data Pemilik
    Route::get("/pemilik", [PemilikController::class, "data_pemilik"]);
    Route::post("/simpan_data_pemilik", [PemilikController::class, "simpan_data_pemilik"]);
    Route::get("/edit_pemilik", [PemilikController::class, "edit_pemilik"]);
    Route::post("/update_data_pemilik", [PemilikController::class, "update_data_pemilik"]);
    Route::get("/pemilik/{id_pemilik}/delete", [PemilikController::class, "delete_data_pemilik"]);

    // Data Kendaraan
    Route::get("/kendaraan", [KendaraanController::class, "data_kendaraan"]);
    Route::post("/simpan_data_kendaraan", [KendaraanController::class, "simpan_data_kendaraan"]);
    Route::get("/edit_kendaraan", [KendaraanController::class, "edit_kendaraan"]);
    Route::post("/update_data_kendaraan", [KendaraanController::class, "update_data_kendaraan"]);
    Route::get("/kendaraan/{id_kendaraan}/delete", [KendaraanController::class, "delete_data_kendaraan"]);

    // Data Pelanggan
    Route::get("/pelanggan", [PelangganController::class, "data_pelanggan"]);
    Route::get("/edit_pelanggan", [PelangganController::class, "edit_pelanggan"]);
    Route::post("/update_data_pelanggan", [PelangganController::class, "update_data_pelanggan"]);
    Route::get("/pelanggan/{id}/delete", [PelangganController::class, "delete_data_pelanggan"]);

    // Data Jenis Service
    Route::get("/jenis_service", [JenisServiceController::class, "jenis_service"]);
    Route::post("/simpan_data_jenis_service", [JenisServiceController::class, "simpan_data_jenis_service"]);
    Route::get("/edit_jenis_service", [JenisServiceController::class, "edit_jenis_service"]);
    Route::post("/update_data_jenis_service", [JenisServiceController::class, "update_data_jenis_service"]);
    Route::get("/jenis_service/{id_jenis_service}/delete", [JenisServiceController::class, "delete_jenis_service"]);

    // Data Service
    Route::get("/service", [ServiceController::class, "data_service"]);
    Route::post("/simpan_data_service", [ServiceController::class, "simpan_data_service"]);
    Route::get("/edit_service", [ServiceController::class, "edit_service"]);
    Route::post("/update_service", [ServiceController::class, "update_service"]);
    Route::get("/service/{id_service}/delete", [ServiceController::class, "delete_data_service"]);

    // Data Rental
    Route::get("/detail_kendaraan/{id}/detail", [RentalController::class, "detail_kendaraan"]);
    Route::get("/detail_kendaraan/{id}/detail/create_transaksi", [RentalController::class, "create_transaksi"]);
    Route::post("/simpan_data_transaksi", [RentalController::class, "simpan_data_transaksi"]);

    // Data Transaksi
    Route::get("/transaksi", [TransaksiController::class, "data_transaksi"]);
    Route::get("/detail_pelanggan_transaksi/{id}/detail_trans", [TransaksiController::class, "detail_trans"]);

    // Data Users
    Route::get("/users", [AppController::class, "users"]);
    Route::post("/simpan_data_users", [AppController::class, "simpan_data_users"]);
    Route::get("/edit_users", [AppController::class, "edit_users"]);
    Route::post("/update_data_users", [AppController::class, "update_data_users"]);

    Route::get("/logout", [AppController::class, "logout"]);

    Route::get("/pelanggan", [PelangganController::class, "data_pelanggan"]);

    // Data Pengembalian
    Route::get("/pengembalian", [PengembalianController::class, "data_pengembalian"]);
    Route::get("/detail_pengembalian/{id}/Pengembalian", [PengembalianController::class, "detail_pengembalian"]);
    Route::post("/update_data_pengembalian", [PengembalianController::class, "update_data_pengembalian"]);
    Route::get("/detail_pengembalian_rental/{id}/rental_kembali", [PengembalianController::class, "rental_kembali"]);

    // Data Setoran
    Route::get("/setoran", [SetoranController::class, "data_setoran"]);
    Route::post("/simpan_data_setoran", [SetoranController::class, "simpan_data_setoran"]);
    Route::get("/edit_setoran", [SetoranController::class, "edit_setoran"]);
    Route::post("/update_data_setoran", [SetoranController::class, "update_data_setoran"]);
    Route::get("/setoran/{id}/delete", [SetoranController::class, "delete_data_setoran"]);
});
