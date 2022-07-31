<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\AssetController;
use App\Http\Controllers\AttributeController;
use App\Http\Controllers\BarangController;
use App\Http\Controllers\ConditionController;
use App\Http\Controllers\EmployeeController;
use App\Http\Controllers\GambarController;
use App\Http\Controllers\KaryawanController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\KategoriController;
use App\Http\Controllers\KondisiController;
use App\Http\Controllers\LapanganController;
use App\Http\Controllers\PeminjamanController;
use App\Http\Controllers\RuanganController;
use App\Http\Controllers\StokController;
use App\Http\Controllers\TanahController;
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

Route::get("/gambar", function () {
	return view("content.gambar");
});

Route::post("/save_gambar", [AdminController::class, "save_gambar"]);

Route::get('/', function () {
	return view('welcome');
});

Route::get("/halaman", function () {
	return view("content.layouts.app");
});

Route::post("/admin/signin", [AdminController::class, "signin"]);

Route::group(["middleware" => ["guest"]], function () {
	Route::prefix("admin")->group(function () {
		Route::get("/login", [AdminController::class, "login"]);
	});
});

Route::group(["middleware" => ["admin"]], function () {
	Route::prefix("admin")->group(function () {
		Route::get("/dashboard", [AdminController::class, "dashboard"]);

        Route::get("/kategori", [KategoriController::class, "kategori"]);
		Route::post("/tambah_kategori", [KategoriController::class, "tambah_kategori"]);
		Route::get("/{id}/edit_kategori", [KategoriController::class,"edit_kategori"]);
		Route::post("/update_kategori", [KategoriController::class,"update_kategori"]);
		Route::get("/{id}/hapus_kategori", [KategoriController::class,"hapus_kategori"]);

		Route::get("/tanah", [TanahController::class, "tanah"]);
		Route::post("/tambah_tanah", [TanahController::class, "tambah_tanah"]);
		Route::get("/{id}/edit_tanah", [TanahController::class, "edit_tanah"]);
		Route::post("/update_tanah", [TanahController::class, "update_tanah"]);
		Route::get("/{id}/hapus_tanah", [TanahController::class, "hapus_tanah"]);

		Route::get("/karyawan", [KaryawanController::class, "karyawan"]);
		Route::post("/tambah_karyawan", [KaryawanController::class, "tambah_karyawan"]);
		Route::get("/{id}/edit_karyawan", [KaryawanController::class, "edit_karyawan"]);
		Route::post("/update_karyawan", [KaryawanController::class, "update_karyawan"]);
		Route::get("/delete_employee/{id}", [EmployeeController::class, "delete_employee"]);

		Route::get("/ruangan", [RuanganController::class, "ruangan"]);
		Route::post("/tambah_ruangan", [RuanganController::class, "tambah_ruangan"]);
		Route::get("/ajax_edit_ruangan", [RuanganController::class, "ajax_edit_ruangan"]);
		Route::post("/update_ruangan", [RuanganController::class, "update_ruangan"]);
		Route::get("/{id}/hapus_ruangan", [RuanganController::class, "hapus_ruangan"]);

		Route::get("/lapangan", [LapanganController::class, "lapangan"]);
		Route::post("/tambah_lapangan", [LapanganController::class, "tambah_lapangan"]);
		Route::get("/ajax_edit_lapangan", [LapanganController::class, "ajax_edit_lapangan"]);
		Route::post("/update_lapangan", [LapanganController::class, "update_lapangan"]);
		Route::get("/{id}/hapus_lapangan", [LapanganController::class, "hapus_lapangan"]);

		Route::get("/barang", [BarangController::class, "barang"]);
		Route::post("/tambah_barang", [BarangController::class, "tambah_barang"]);
		Route::get("/ajax_edit_barang", [BarangController::class, "ajax_edit_barang"]);
		Route::post("/update_barang", [BarangController::class, "update_barang"]);
		Route::get("/{id}/hapus_barang", [BarangController::class, "hapus_barang"]);
		Route::post("/tambah_stok", [BarangController::class, "tambah_stok"]);

		Route::get("/asset", [AssetController::class, "asset"]);
		Route::post("/tambah_asset", [AssetController::class, "tambah_asset"]);
		Route::get("/{id}/edit_asset", [AssetController::class, "edit_asset"]);
		Route::post("/update_asset", [AssetController::class, "update_asset"]);
		Route::get("/{id}/hapus_asset", [AssetController::class, "hapus_asset"]);

		Route::get("/attribute", [AttributeController::class, "attribute"]);
		Route::post("/tambah_attribute", [AttributeController::class, "tambah_attribute"]);
		Route::get("/{id}/edit_attribute", [AttributeController::class, "edit_attribute"]);
		Route::post("/update_attribute", [AttributeController::class, "update_attribute"]);
		Route::get("/{id}/hapus_attribute", [AttributeController::class, "hapus_attribute"]);

		Route::get("/gambar_ruangan", [GambarController::class, "gambar_ruangan"]);
		Route::post("/tambah_gambar_ruangan", [GambarController::class, "tambah_gambar_ruangan"]);
		Route::get("/{id}/edit_gambar_ruangan", [GambarController::class, "edit_gambar_ruangan"]);
		Route::post("/update_gambar_ruangan", [GambarController::class, "update_gambar_ruangan"]);
		Route::get("/{id}/hapus_gambar_ruangan", [GambarController::class, "hapus_gambarsss_ruangan"]);

		Route::get("/gambar", [GambarController::class, "gambar"]);
		Route::post("/tambah_gambar", [GambarController::class, "tambah_gambar"]);
		Route::get("/{id}/edit_gambar", [GambarController::class, "edit_gambar"]);
		Route::post("/update_gambar", [GambarController::class, "update_gambar"]);
		Route::get("/{id}/hapus_gambar", [GambarController::class, "hapus_gambar"]);

		Route::get("/gambar_lapangan", [GambarController::class, "gambar_lapangan"]);
		Route::post("/tambah_gambar_lapangan", [GambarController::class, "tambah_gambar_lapangan"]);
		Route::get("/{id}/edit_gambar_lapangan", [GambarController::class, "edit_gambar_lapangan"]);
		Route::post("/update_gambar_lapangan", [GambarController::class, "update_gambar_lapangan"]);

		Route::get("/stok", [StokController::class, "stok"]);
		Route::post("/tambah_stock", [StokController::class, "tambah_stock"]);
		Route::get("/ajax_edit_stok", [StokController::class, "ajax_edit_stok"]);
		Route::post("/update_stok", [StokController::class, "update_stok"]);
		Route::get("/{id}/hapus_stok", [StokController::class, "hapus_stok"]);

		Route::get("/kondisi", [KondisiController::class, "kondisi"]);
		Route::post("/tambah_kondisi", [KondisiController::class, "tambah_kondisi"]);
		Route::get("/{id}/edit_kondisi", [KondisiController::class, "edit_kondisi"]);
		Route::post("/update_kondisi", [KondisiController::class, "update_kondisi"]);
		Route::get("/{id}/hapus_kondisi", [ConditionController::class, "delete_kondisi"]);

		Route::get("/akun", [AdminController::class, "akun"]);
		Route::post("/tambah_akun", [AdminController::class, "tambah_akun"]);
		Route::get("/{id}/ganti_password", [AdminController::class, "ganti_password"]);
		Route::post("/update_akun", [AdminController::class, "update_akun"]);
		Route::get("/delete_akun/{id}", [AdminController::class, "delete_akun"]);
		Route::post("/reset_password", [AdminController::class, "reset_password"]);

		Route::get("/peminjaman", [PeminjamanController::class, "peminjaman"]);
		Route::post("/tambah_peminjaman", [PeminjamanController::class, "tambah_peminjaman"]);
		Route::get("/{id}/edit_peminjaman", [PeminjamanController::class, "edit_peminjaman"]);
		Route::post("/update_peminjaman", [PeminjamanController::class, "update_peminjaman"]);
		Route::get("/{id}/hapus_peminjaman", [PeminjamanController::class, "hapus_peminjaman"]);

		Route::post("/ganti_password", [AdminController::class, "ganti_password"]);

		Route::get("/logout", [AdminController::class, "logout"]);
	});
});
