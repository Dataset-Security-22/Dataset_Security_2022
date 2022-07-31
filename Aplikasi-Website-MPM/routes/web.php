<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\AppController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\JurusanController;
use App\Http\Controllers\ProdiController;
use App\Http\Controllers\KelasController;
use App\Http\Controllers\AnggotaController;
use App\Http\Controllers\BagianController;
use App\Http\Controllers\JabatanController;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\ProkerController;
use App\Http\Controllers\KegiatanController;
use App\Http\Controllers\ProfilController;
use App\Http\Controllers\BeritaController;
use App\Http\Controllers\LoginAdminController;
use App\Http\Controllers\AkunController;
use App\Http\Controllers\DivisiController;
use App\Http\Controllers\AbsensiController;
use App\Http\Controllers\KasController;
use App\Http\Controllers\LandingController;
use App\Http\Controllers\SettingsController;
use App\Http\Controllers\LaporanController;
use App\Http\Controllers\AppLandingController;
use App\Http\Controllers\KontakController;
use App\Http\Controllers\LastLoginController;
use App\Http\Controllers\AspirasiController;
use App\Http\Controllers\KategoriController;
use App\Http\Controllers\TentangKamiController;
use App\Http\Controllers\AngkatanController;
use App\Http\Controllers\PostBlogController;
use App\Http\Controllers\HubungiKamiController;

Route::group(["middleware" => ["guest"]], function() {

	Route::get("/login", [AppLandingController::class, "login"]);
	Route::post("/post_login", [AppLandingController::class, "post_login"]);

});

Route::group(["middleware" => ["mahasiswa"]], function() {

	Route::get("/form_aspirasi", [AspirasiController::class, "form_aspirasi"]);
	Route::get("/aspirasi", [AspirasiController::class, "data_aspirasi"]);
	Route::post("/tambah", [AspirasiController::class, "tambah"]);
	Route::get("/logout", [AppLandingController::class, "logout"]);
});

Route::post("kirim_pesan", [AppLandingController::class, "kirim_pesan"]);

Route::get("/galeri", [AppLandingController::class, "galeri"]);

Route::post("/tambah_pesan", [AppLandingController::class, "tambah_pesan"]);
Route::get("/register", [AppLandingController::class, "register"]);
Route::post("/cek_register", [AppLandingController::class, "cek_register"]);

Route::post("/kirim_login", [AppLandingController::class, "kirim_login"]);
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

Route::get("/", [AppLandingController::class, "index"]);
Route::get("/tentang_kami", [AppLandingController::class, "tentang_kami"]);
Route::get("/blog", [AppLandingController::class, "blog"]);
Route::get("/kontak", [AppLandingController::class, "kontak"]);

Route::get("/template", [AppController::class, "template"]);
Route::get("/template_bph", function() {
	return view("/page/layouts/template_bph");
});


Route::get("/register_akun", [AppLandingController::class, "register_akun"]);
Route::post("/cek_register", [AppLandingController::class, "cek_register"]);
Route::get("/template_user", [AppLandingController::class, "template_user"]);

Route::prefix("page")->group(function() {

	Route::group(["middleware" => ["guest"]], function() {
		Route::get("/login", [LoginController::class, "login"]);
		Route::post("/post_login", [LoginController::class, "post_login"]);
	});

	Route::prefix("bph")->group(function() {

		Route::group(["middleware" => ["bph"]], function() {
			Route::get("/dashboard", [AppController::class, "dashboard_bph"]);

			Route::get("data_absen", [AbsensiController::class, "data_absen"]);
			Route::get("data_absen_pertanggal", [AbsensiController::class, "data_absen_pertanggal"]);
			Route::post("simpan_data_absen", [AbsensiController::class, "simpan_data_absen"]);
			Route::post("simpan_data_absen_pertanggal", [AbsensiController::class, "simpan_data_absen_pertanggal"]);
			Route::get("edit_absen_pertanggal", [AbsensiController::class, "edit_absen_pertanggal"]);
			Route::post("edit_data_absen_pertanggal", [AbsensiController::class, "edit_data_absen_pertanggal"]);
			Route::get("get_absen", [AbsensiController::class, "get_absen"]);

			Route::prefix("kas")->group(function() {
				Route::get("/data_kas", [KasController::class, "data_kas_sekarang"]);
				Route::post("/simpan_data_kas", [KasController::class, "simpan_data_kas"]);
				Route::get("/data_kas_pertanggal", [KasController::class, "data_kas_pertanggal"]);
				Route::post("/tambah_kas_pertanggal", [KasController::class, "tambah_kas_pertanggal"]);
				Route::get("/edit_kas_pertanggal", [KasController::class, "edit_kas_pertanggal"]);
				Route::post("/simpan_data_kas_pertanggal", [KasController::class, "simpan_data_kas_pertanggal"]);
			});

			Route::prefix("laporan")->group(function() {
				Route::get("/data_absen", [AbsensiController::class, "laporan_data_absen"]);
				Route::get("/data_absen/{id}/detail", [AbsensiController::class, "detail_laporan_absensi"]);

				Route::get("/data_kas", [KasController::class, "laporan_data_kas"]);
				Route::get("/data_kas/{id_divisi}/detail", [KasController::class, "detail_laporan_kas"]);
			});

			Route::get("/logout", [LoginController::class, "logout"]);
		});
	});

	Route::prefix("admin")->group(function() {

		Route::group(["middleware" => ["admin"]], function() {
			Route::get("/", [AppController::class, "dashboard"]);
			Route::get("/dashboard", [AppController::class, "dashboard"]);

			Route::get("/404", function() {
				return view("page/error/404");
			});

			Route::prefix("jurusan")->group(function() {
				Route::get("/", [JurusanController::class, "index"]);
				Route::post("/tambah", [JurusanController::class, "tambah"]);
				Route::get("/edit/{id_jurusan}", [JurusanController::class, "edit"]);
				Route::post("/simpan", [JurusanController::class, "simpan"]);
				Route::delete("/hapus/{id_jurusan}", [JurusanController::class, "hapus"]);
			});

			// Data Prodi
			Route::prefix("/prodi")->group(function() {
				Route::get("/", [ProdiController::class, "index"]);
				Route::post("/tambah", [ProdiController::class, "tambah"]);
				Route::get("/edit/{id_prodi}", [ProdiController::class, "edit"]);
				Route::post("/simpan", [ProdiController::class, "simpan"]);
				Route::delete("/hapus/{id_prodi}", [ProdiController::class, "hapus"]);
			});

			// Data Kelas
			Route::prefix("/kelas")->group(function() {
				Route::get("/", [KelasController::class, "index"]);
				Route::post("/tambah", [KelasController::class, "tambah"]);
				Route::get("/edit/{id_kelas}", [KelasController::class, "edit"]);
				Route::post("/simpan", [KelasController::class, "simpan"]);
				Route::delete("/hapus/{id_kelas}", [KelasController::class, "hapus"]);
			});

			// Data Anggota
			Route::prefix("/anggota")->group(function() {
				Route::get("/", [AnggotaController::class, "index"]);
				Route::post("/tambah", [AnggotaController::class, "tambah"]);
				Route::get("/edit", [AnggotaController::class, "edit"]);
				Route::post("/simpan", [AnggotaController::class, "simpan"]);
				Route::delete("/hapus/{nim}", [AnggotaController::class, "hapus"]);
				Route::get("/{id}/detail", [AnggotaController::class, "detail"]);
			});

			// Data Bagian
			Route::prefix("/bagian")->group(function() {
				Route::get("/", [BagianController::class, "index"]);
				Route::post("/tambah", [BagianController::class, "tambah"]);
				Route::get("/edit/{id_bagian}", [BagianController::class, "edit"]);
				Route::post("simpan", [BagianController::class, "simpan"]);
				Route::delete("/hapus/{id_bagian}", [BagianController::class, "hapus"]);
			});


			// Data Jabatan
			Route::prefix("/jabatan")->group(function() {
				Route::get("/", [JabatanController::class, "index"]);
				Route::post("/tambah", [JabatanController::class, "tambah"]);
				Route::get("/edit/{id_jabatan}", [JabatanController::class, "edit"]);
				Route::post("/simpan", [JabatanController::class, "simpan"]);
				Route::delete("/hapus/{id_jabatan}", [JabatanController::class, "hapus"]);
			});

			// Data Divisi
			Route::prefix("/divisi")->group(function() {
				Route::get("/", [DivisiController::class, "index"]);
				Route::post("/tambah", [DivisiController::class, "tambah"]);
				Route::get("/edit/{id_divisi}", [DivisiController::class, "edit"]);
				Route::post("/simpan", [DivisiController::class, "simpan"]);
				Route::delete("/hapus/{id_divisi}", [DivisiController::class, "hapus"]);
			});

			// Data Kegiatan
			Route::prefix("/kegiatan")->group(function() {
				Route::get("/", [KegiatanController::class, "index"]);
				Route::post("/tambah", [KegiatanController::class, "tambah"]);
				Route::get("/edit", [KegiatanController::class, "edit"]);
				Route::post("/simpan", [KegiatanController::class, "simpan"]);
				Route::post("/hapus", [KegiatanController::class, "hapus"]);
			});

			// Data Proker
			Route::prefix("/proker")->group(function() {
				Route::get("/", [ProkerController::class, "index"]);
				Route::get("/form_tambah", [ProkerController::class, "form_tambah"]);
				Route::post("/tambah", [ProkerController::class, "tambah"]);
				Route::get("/edit/{id_proker}", [ProkerController::class, "edit"]);
				Route::post("/simpan", [ProkerController::class, "simpan"]);
				Route::post("/hapus", [ProkerController::class, "hapus"]);
			});

			// Settings
			Route::prefix("/settings")->group(function() {
				Route::get("/", [SettingsController::class, "index"]);
				Route::post("/tambah", [SettingsController::class, "tambah"]);
				Route::get("/edit", [SettingsController::class, "edit"]);
				Route::post("/simpan", [SettingsController::class, "simpan"]);
				Route::post("/hapus", [SettingsController::class, "hapus"]);
			});

			// Data Tentang Kami
			Route::prefix("/tentang_kami")->group(function() {
				Route::get("/", [TentangKamiController::class, "index"]);
				Route::post("/tambah", [TentangKamiController::class, "tambah"]);
				Route::post("/simpan", [TentangKamiController::class, "simpan"]);
				Route::delete("/hapus/{id}", [TentangKamiController::class, "hapus"]);
			});

			// Data Users
			Route::prefix("/akun")->group(function() {
				Route::get("/", [AkunController::class, "index"]);
				Route::post("/tambah", [AkunController::class, "tambah"]);
				Route::get("/edit", [AkunController::class, "edit"]);
				Route::post("/simpan", [AkunController::class, "simpan"]);
				Route::post("/hapus", [AkunController::class, "hapus"]);
			});

			// Data Role
			Route::prefix("/role")->group(function() {
				Route::get("/", [RoleController::class, "index"]);
				Route::post("/tambah", [RoleController::class, "tambah"]);
				Route::get("/edit/{id_role}", [RoleController::class, "edit"]);
				Route::post("/simpan", [RoleController::class, "simpan"]);
				Route::delete("/hapus/{id_role}", [RoleController::class, "hapus"]);
			});

			Route::prefix("/kategori")->group(function() {
				Route::get("/", [KategoriController::class, "index"]);
				Route::post("/tambah", [KategoriController::class, "tambah"]);
				Route::get("/edit/{id_kategori}", [KategoriController::class, "edit"]);
				Route::post("/simpan", [KategoriController::class, "simpan"]);
				Route::delete("/hapus/{id_kategori}", [KategoriController::class, "hapus"]);
			});

			Route::prefix("/post_blog")->group(function() {
				Route::get("/", [PostBlogController::class, "index"]);
				Route::get("/form_tambah", [PostBlogController::class, "form_tambah"]);
				Route::post("/tambah", [PostBlogController::class, "tambah"]);
				Route::get("/edit/{id}", [PostBlogController::class, "edit"]);
				Route::post("/simpan", [PostBlogController::class, "simpan"]);
				Route::delete("/hapus/{id}", [PostBlogController::class, "hapus"]);
			});

			// Data Profil
			Route::prefix("/profil")->group(function() {
				Route::get("/", [ProfilController::class, "index"]);
				Route::post("/tambah", [ProfilController::class, "tambah"]);
				Route::get("/edit/{id_profil}", [ProfilController::class, "edit"]);
				Route::post("/simpan", [ProfilController::class, "simpan"]);
				Route::post("/hapus", [ProfilController::class, "hapus"]);
			});

			// Data Berita
			Route::prefix("/berita")->group(function() {
				Route::get("/", [BeritaController::class, "index"]);
				Route::post("/tambah", [BeritaController::class, "tambah"]);
				Route::get("/edit/{id}", [BeritaController::class, "edit"]);
				Route::post("/simpan", [BeritaController::class, "simpan"]);
				Route::post("/hapus", [BeritaController::class, "hapus"]);
				Route::post("/aktifkan", [BeritaController::class, "aktifkan"]);
				Route::post("/non_aktifkan", [BeritaController::class, "non_aktifkan"]);
			});

			// Data KAS
			Route::prefix("/kas")->group(function() {
				Route::get("/", [KasController::class, "index"]);
				Route::get("/tambah", [KasController::class, "tambah"]);
				Route::post("/simpan", [KasController::class, "simpan"]);
				Route::get("/data_kas", [KasController::class, "data_kas"]);
			});

			Route::prefix("/angkatan")->group(function() {
				Route::get("/", [AngkatanController::class, "index"]);
				Route::post("/tambah", [AngkatanController::class, "tambah"]);
				Route::get("/edit/{id_angkatan}", [AngkatanController::class, "edit"]);
				Route::post("/simpan", [AngkatanController::class, "simpan"]);
				Route::delete("/hapus/{id_angkatan}", [AngkatanController::class, "hapus"]);
				Route::post("/aktifkan", [AngkatanController::class, "aktifkan"]);
				Route::post("/non_aktifkan", [AngkatanController::class, "non_aktifkan"]);
			});

			Route::prefix("/last-login")->group(function() {
				Route::get("/", [LastLoginController::class, "index"]);
			});

			Route::get("/aktifkan_akun", [AppLandingController::class, "aktifkan_akun"]);
			Route::get("/hubungi_kami", [HubungiKamiController::class, "hubungi_kami"]);

			Route::post("/cek_aktifkan_akun", [AppLandingController::class, "cek_aktifkan_akun"]);

			Route::prefix("/laporan")->group(function() {
				Route::get("/data_absen", [LaporanController::class, "laporan_data_absen"]);
				Route::get("/data_kas", [LaporanController::class, "laporan_data_kas"]);
				Route::get("/data_absen/{id_divisi}/detail", [LaporanController::class, "detail_laporan_absen"]);
				Route::get("/data_kas/{id_divisi}/detail", [LaporanController::class, "detail_laporan_kas"]);
			});

			// Data Kontak
			Route::prefix("/kontak")->group(function() {
				Route::get("/", [KontakController::class, "index"]);
			});

			Route::get("/logout", [LoginController::class, "logout"]);
		});

});

});
