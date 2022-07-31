<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PelatihController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\MuridController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\FullCalenderController;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\AkunController;
use App\Http\Controllers\KategoriTariController;
use App\Http\Controllers\NilaiController;
use App\Http\Controllers\AbsenController;
use App\Http\Controllers\PelatihKategoriTariController;
use App\Http\Controllers\AppController;
use App\Http\Controllers\KemampuanController;
use App\Http\Controllers\LandingController;
use App\Http\Controllers\FormController;

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
Route::get("/template_pengunjung", [LandingController::class, "template_pengunjung"]);
Route::get("/", [LandingController::class, "index"]);
Route::get("/login", [LandingController::class, "login"]);
Route::get("/pengunjung/kategori", [LandingController::class, "kategori"]);
// login adminController

Route::group(["middleware" => ["guest"]], function() {

    Route::prefix("admin")->group(function() {

        Route::get("/login", [LoginController::class, "login"]);

        Route::post("/post_login", [LoginController::class, "post_login"] );

    });

});

Route::group(["middleware" => ["admin"]], function() {

    Route::prefix("admin")->group(function() {

        Route::get("/dashboard", [AdminController::class, "dashboard"]);

        Route::prefix("kemampuan")->group(function() {
            Route::get("/", [KemampuanController::class, "index"]);
            Route::post("/tambah/", [KemampuanController::class, "tambah"]);
            Route::post("/hapus", [KemampuanController::class, "hapus"]);
            Route::get("/edit/{id_role}", [KemampuanController::class, "edit"]);
            Route::post("/simpan", [KemampuanController::class, "simpan"]);
        });

        Route::prefix("full-calender")->group(function() {
            Route::get("/", [FullCalenderController::class, "index"]);
            Route::post("/action", [FullCalenderController::class, "action"]);
        });

        Route::prefix("role")->group(function() {
            Route::get("/", [RoleController::class, "index"]);
            Route::post("/tambah/", [RoleController::class, "tambah"]);
            Route::post("/hapus", [RoleController::class, "hapus"]);
            Route::get("/edit/{id_role}", [RoleController::class, "edit"]);
            Route::post("/simpan", [RoleController::class, "simpan"]);
        });

        Route::prefix("pelatih")->group(function() {
            Route::get("/", [PelatihController::class, "index"]);
            Route::post("/store", [PelatihController::class, "store"]);
            Route::get("/tambah_data", [PelatihController::class, "tambah_data"]);
            Route::get("/edit/{id}", [PelatihController::class, "edit"]);
            Route::get("/detail/{id}", [PelatihController::class, "detail"]);
            Route::post("/hapus/", [PelatihController::class, "destroy"]);
            Route::post("/update", [PelatihController::class, "update"]);
        });

        Route::prefix("murid")->group(function() {
            Route::get("/", [MuridController::class, "index"]);
            Route::post("/store", [MuridController::class, "store"]);
            Route::get("/tambah_data", [MuridController::class, "tambah_data"]);
            Route::get("/edit/{id}", [MuridController::class, "edit"]);
            Route::get("/detail/{id}", [MuridController::class, "detail"]);
            Route::post("/hapus", [MuridController::class, "destroy"]);
            Route::post("/update", [MuridController::class, "update"]);
        });

        Route::prefix("users")->group(function() {
            Route::get("/", [AkunController::class, "index"]);
            Route::post("/tambah/", [AkunController::class, "tambah"]);
            Route::post("/hapus", [AkunController::class, "hapus"]);
            Route::get("/edit/{id_role}", [AkunController::class, "edit"]);
            Route::post("/simpan", [AkunController::class, "simpan"]);
        });

        Route::prefix("kategori_tari")->group(function() {
            Route::get("/", [KategoriTariController::class, "index"]);
            Route::post("/tambah/", [KategoriTariController::class, "tambah"]);
            Route::post("/hapus", [KategoriTariController::class, "hapus"]);
            Route::get("/edit/{id_role}", [KategoriTariController::class, "edit"]);
            Route::post("/simpan", [KategoriTariController::class, "simpan"]);
        });

        Route::prefix("pelatih_kategori_tari")->group(function() {
            Route::get("/", [PelatihKategoriTariController::class, "index"]);
            Route::post("/tambah", [PelatihKategoriTariController::class, "tambah"]);
            Route::post("/hapus", [PelatihKategoriTariController::class, "hapus"]);
            Route::get("/edit/{id_pelatih_kategori}", [PelatihKategoriTariController::class, "edit"]);
            Route::post("/simpan", [PelatihKategoriTariController::class, "simpan"]);
        });

        Route::prefix("form")->group(function() {
            Route::get("/", [FormController::class, "index"]);
            Route::get("/store", [FormController::class, "store"]);
            Route::post("/tambah/", [FormController::class, "tambah"]);
            Route::post("/hapus", [FormController::class, "hapus"]);
        });


        Route::get("/logout", [LoginController::class, "logout"]);
    });

});

Route::group(["middleware" => ["pelatih"]], function() {

    Route::prefix("pelatih")->group(function() {

        Route::get("/template_pelatih", [AppController::class, "template_pelatih"]);
    
        Route::get("/", [AppController::class, "dashboard"]);
        Route::get("/dashboard", [AppController::class, "dashboard"]);
    
        Route::prefix("nilai")->group(function() {
            Route::get("/", [NilaiController::class, "index"]);
            Route::get("/detail_nilai/{id}", [NilaiController::class, "detail_nilai"]);
            Route::post("/tambah/", [NilaiController::class, "tambah"]);
            Route::post("/hapus", [NilaiController::class, "hapus"]);
            Route::get("/edit", [NilaiController::class, "edit"]);
            Route::get("/detail/{id}", [NilaiController::class, "detail"]);
            Route::post("/simpan", [NilaiController::class, "simpan"]);
        });
    
        Route::prefix("absen")->group(function() {
            Route::get("/hari_ini", [AbsenController::class, "hari_ini"]);
            Route::post("/tambah_absen_hari_ini/", [AbsenController::class, "tambah_absen_hari_ini"]);
    
            Route::get("/pertanggal", [AbsenController::class, "pertanggal"]);
            Route::post("/tambah_absen_pertanggal", [AbsenController::class, "tambah_absen_pertanggal"]);
            Route::get("/edit_absen", [AbsenController::class, "edit_absen"]);
            Route::post("/simpan_data_edit_absen", [AbsenController::class, "simpan_data_edit_absen"]);
    
            Route::post("/hapus", [AbsenController::class, "hapus"]);
            Route::get("/edit/{id}", [AbsenController::class, "edit"]);
            Route::post("/simpan", [AbsenController::class, "simpan"]);
        });
    
    });

});





Route::prefix("pengunjung")->group(function() {

    Route::prefix("form")->group(function() {
        Route::get("/", [FormController::class, "index"]);
        Route::get("/store", [FormController::class, "store"]);
        Route::post("/tambah/", [FormController::class, "tambah"]);
        Route::post("/hapus", [FormController::class, "hapus"]);
    });

    Route::prefix("event")->group(function() {
        Route::get("/", [FormController::class, "index"]);
        Route::get("/store", [FormController::class, "store"]);
        Route::post("/tambah/", [FormController::class, "tambah"]);
        Route::post("/hapus", [FormController::class, "hapus"]);
    });

    Route::prefix("full-calender")->group(function() {
        Route::get("/", [FullCalenderController::class, "index_pengunjung"]);
        Route::post("/action", [FullCalenderController::class, "action"]);
    });

});
