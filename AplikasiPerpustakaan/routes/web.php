<?php

use App\Http\Controllers\AnggotaController;
use App\Http\Controllers\AppController;
use App\Http\Controllers\BukuController;
use App\Http\Controllers\KategoriController;
use App\Http\Controllers\LaporanController;
use App\Http\Controllers\PengembalianController;
use App\Http\Controllers\PinjamController;
use App\Http\Controllers\ProdiController;
use App\Http\Controllers\RakController;
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
    Route::get("/", [AppController::class, "login"]);
    Route::get("/template", [AppController::class, "template"]);
    Route::get("/login", [AppController::class, "login"]);
    Route::post("/login", [AppController::class, "post_login"]);
    Route::get("/reset_password", [UserController::class, "reset_password"]);
    Route::post("/put_password_new", [UserController::class, "put_password_new"]);
});

Route::group(["middleware" => ["admin"]], function () {
    Route::get("/dashboard", [AppController::class, "dashboard"]);

    // Data Kategori
    Route::get("/kategori", [KategoriController::class, "data_kategori"]);
    Route::post("/kategori", [KategoriController::class, "post_kategori"]);
    Route::get("/kategori/{id}", [KategoriController::class, "edit_kategori"]);
    Route::put("/kategori", [KategoriController::class, "put_kategori"]);
    Route::get("/hapus_kategori/{id}", [KategoriController::class, "hapus_kategori"]);

    // Data Rak
    Route::get("/rak", [RakController::class, "data_rak"]);
    Route::post("/rak", [RakController::class, "post_rak"]);
    Route::get("/rak/{id}", [RakController::class, "edit_rak"]);
    Route::put("/rak", [RakController::class, "put_rak"]);
    Route::get("/hapus_data_rak/{id}", [RakController::class, "hapus_rak"]);

    // Data Prodi
    Route::get("/prodi", [ProdiController::class, "data_prodi"]);
    Route::post("/prodi", [ProdiController::class, "post_prodi"]);
    Route::get("/prodi/{id}", [ProdiController::class, "edit_prodi"]);
    Route::put("/prodi", [ProdiController::class, "put_prodi"]);
    Route::get("/hapus_prodi/{id}", [ProdiController::class, "hapus_prodi"]);
    // Data Anggota
    Route::get("/anggota", [AnggotaController::class, "data_anggota"]);
    Route::post("/anggota", [AnggotaController::class, "post_anggota"]);
    Route::get("/edit_anggota", [AnggotaController::class, "edit_anggota"]);
    Route::put("/anggota", [AnggotaController::class, "put_anggota"]);
    Route::get("/hapus_anggota/{id}", [AnggotaController::class, "hapus_anggota"]);

    // Data Buku
    Route::get("/buku", [BukuController::class, "data_buku"]);
    Route::post("/buku", [BukuController::class, "post_buku"]);
    Route::get("/edit_buku", [BukuController::class, "edit_buku"]);
    Route::put("/buku", [BukuController::class, "put_buku"]);
    Route::get("/hapus_data_buku/{id}", [BukuController::class, "hapus_buku"]);

    // Data Peminjaman
    Route::get("/pinjam", [PinjamController::class, "data_peminjaman"]);
    Route::post("/pinjam", [PinjamController::class, "post_peminjaman"]);
    Route::get("/edit_peminjaman", [PinjamController::class, "edit_peminjaman"]);
    Route::put("/pinjam", [PinjamController::class, "put_peminjaman"]);
    Route::get("/hapus_peminjaman/{id}", [PinjamController::class, "hapus_peminjaman"]);
    Route::get("/detail_peminjaman/{id}", [PinjamController::class, "detail_peminjaman"]);

    // Data Pengembalian
    Route::get("/pengembalian", [PengembalianController::class, "data_pengembalian"]);
    Route::get("/detail_pengembalian", [PengembalianController::class, "detail_pengembalian"]);
    Route::get("/pengembalian_buku/{id}", [PengembalianController::class, "pengembalian_buku"]);
    Route::put("/pengembalian_buku", [PengembalianController::class, "put_pengembalian_buku"]);

    // Data Laporan
    Route::get("/laporan", [LaporanController::class, "laporan"]);
    Route::get("/laporan_perhari", [LaporanController::class, "laporan_perhari"]);
    // Data Users
    Route::get("/users", [UserController::class, "data_user"]);
    Route::post("/users", [UserController::class, "post_users"]);
    Route::get("/ganti_password", [UserController::class, "ganti_password"]);
    Route::put("/put_password", [UserController::class, "put_password"]);
    Route::put("/users", [UserController::class, "put_users"]);
    Route::get("/hapus_users/{id}", [UserController::class, "hapus_users"]);

    Route::get("/help", [AppController::class, "help"]);

    Route::get("/logout", [UserController::class, "logout"]);
});
