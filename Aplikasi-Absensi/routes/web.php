<?php

use App\Http\Controllers\AbsenController;
use App\Http\Controllers\AppController;
use App\Http\Controllers\GuruController;
use App\Http\Controllers\GuruPiketController;
use App\Http\Controllers\KelasController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\SiswaController;
use App\Http\Controllers\UserController;
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

Route::group(["middleware" => ["guest"]], function () {
    Route::prefix("page")->group(function() {
        Route::get("/login", [LoginController::class, "login"]);
        Route::post("/login", [LoginController::class, "post_login"] );
    });
});

Route::group(["middleware" => ["admin"]], function() {
    Route::get("/theme", [AppController::class, "theme"]);
    Route::prefix("page")->group(function() {
        Route::get("/dashboard", [AppController::class, "dashboard"]);

        // Data Guru
        Route::get("/guru", [GuruController::class, "data_guru"]);
        Route::post("/simpan_data_guru", [GuruController::class, "simpan_data_guru"]);
        Route::get("/hapus_data_guru/{nip}", [GuruController::class, "hapus_data_guru"]);
        Route::get("/edit_data_guru", [GuruController::class, "edit_data_guru"]);
        Route::put("/update_data_guru", [GuruController::class, "update_data_guru"]);

        // Data Kelas
        Route::get("/kelas", [KelasController::class, "data_kelas"]);
        Route::post("/simpan_data_kelas", [KelasController::class, "simpan_data_kelas"]);
        Route::get("/hapus_data_kelas/{id}", [KelasController::class, "hapus_data_kelas"]);
        Route::get("/edit_data_kelas", [KelasController::class, "edit_data_kelas"]);
        Route::put("/update_data_kelas", [KelasController::class, "update_data_kelas"]);

        // Data Siswa
        Route::get("/siswa", [SiswaController::class, "data_siswa"]);
        Route::post("/simpan_data_siswa", [SiswaController::class, "simpan_data_siswa"]);
        Route::get("/hapus_data_siswa/{nis}", [SiswaController::class, "hapus_data_siswa"]);
        Route::get("/edit_data_siswa", [SiswaController::class, "edit_data_siswa"]);
        Route::put("/update_data_siswa", [SiswaController::class, "update_data_siswa"]);

        // Data Guru Piket
        Route::get("/guru_piket", [GuruPiketController::class, "data_guru_piket"]);
        Route::post("/simpan_data_guru_piket", [GuruPiketController::class, "simpan_data_guru_piket"]);
        Route::get("/hapus_data_guru_piket/{nip}", [GuruPiketController::class, "hapus_data_guru_piket"]);
        Route::get("/edit_guru_piket", [GuruPiketController::class, "edit_guru_piket"]);
        Route::put("/update_data_guru_piket", [GuruPiketController::class, "update_data_guru_piket"]);

        // Data Absen
        Route::get("/tambah_absen", [AbsenController::class, "tambah_absen"]);
        Route::post("/simpan_data_absen", [AbsenController::class, "simpan_data_absen"]);
        Route::get("/data_absen", [AbsenController::class, "data_absen"]);
        Route::put("/update_data_absen", [AbsenController::class, "update_data_absen"]);

        // Data Absen Terlambat
        Route::get("/tambah_absen_terlambat", [AbsenController::class, "tambah_absen_terlambat"]);
        Route::post("/simpan_data_absen_terlambat", [AbsenController::class, "simpan_data_absen_terlambat"]);
        Route::get("/data_siswa_terlambat", [AbsenController::class, "data_siswa_terlambat"]);
        Route::post("/update_data_siswa_terlambat", [AbsenController::class, "update_data_siswa_terlambat"]);

        // Data Laporan
        Route::get("/laporan", [AppController::class, "data_laporan"]);
        Route::get("/laporan_perhari", [AppController::class, "laporan_perhari"]);

        // Data Print
        Route::get("/lihat_data_laporan_keseluruhan", [AppController::class, "lihat_data_laporan_keseluruhan"]);
        Route::get("/lihat_data_laporan_perhari", [AppController::class, "lihat_data_laporan_perhari"]);
        Route::get("/lihat_keseluruhan_laporan_perkelas", [AppController::class, "lihat_keseluruhan_laporan_perkelas"]);
        Route::get("/lihat_data_laporan_perhari_perkelas", [AppController::class, "lihat_data_laporan_perhari_perkelas"]);

        // Data Users
        Route::get("/users", [UserController::class, "user"]);
        Route::post("/simpan_data_users", [UserController::class, "simpan_data_users"]);
        Route::put("/users", [UserController::class, "put_users"]);

        Route::get("/logout", [LoginController::class, "logout"]);

    });
});

