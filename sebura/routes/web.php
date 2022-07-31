<?php

use App\Http\Controllers\AcaraAbsensiController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\LandingPageController;
use App\Http\Controllers\LandingPengurusController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\DataPengurusController;
use App\Http\Controllers\DivisiController;
use App\Http\Controllers\JabatanController;
use App\Http\Controllers\ProdiController;
use App\Http\Controllers\JurusanController;
use App\Http\Controllers\OprecController;
use App\Http\Controllers\AcaraController;
use App\Http\Controllers\KeteranganPanitiaController;
use App\Http\Controllers\PanitiaAcaraController;
use App\Models\DataPengurus;
use App\Models\Login;

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


//Landing Page
Route::get('/', [LandingPageController::class, "landing"]);
Route::get('/home', [LandingPageController::class, "home"]);
Route::get('/login', [LandingPageController::class, "login"]);
Route::get('/visimisi', [LandingPageController::class, "visimisi"]);
Route::get('/kepengurusan', [LandingPageController::class, "kepengurusan"]);
Route::get('/oprec', [LandingPageController::class, "oprec"]);
Route::get('/pengenalandiv', [LandingPageController::class, "pengenalandiv"]);

//Login
Route::post('/login', [LoginController::class, "login"]);
Route::get('/logout', [LoginController::class, "logout"]);
Route::post('/tambahuser', [LoginController::class, "store"])->name('tambahuser');
Route::delete('/deleteuser/{id}', [LoginController::class, "destroy"])->name('deleteuser');

//Admin
Route::get('/admin', [AdminController::class, "admin"])->middleware('auth');
Route::get('/admin/dashboard', [AdminController::class, "dashboard"]);
Route::get('/admin/datauser', [AdminController::class, "datauser"]);
Route::get('/admin/tambahuser', [AdminController::class, "tambahuser"]);
Route::get('/admin/oprec', [AdminController::class, "oprec"]);
Route::get('/admin/absensi', [AdminController::class, "absensi"]);
Route::get('/admin/event', [AdminController::class, "event"]);

Route::get("/admin/datasiuser", [UserController::class, "data"]);
Route::post("/admin/tambahuser", [UserController::class, "store"]);
Route::get("/admin/edituser/{id}", [UserController::class, "edit"]);
Route::post("/admin/simpanuser", [UserController::class, "update"]);

Route::get('/admin/kepengurusan', [DataPengurusController::class, "index"]);
Route::post('/admin/hapus_kepengurusan', [DataPengurusController::class, "hapus_kepengurusan"]);
Route::get("/admin/form_tambah_pengurus", [DataPengurusController::class, "form_tambah_pengurus"]);
Route::post("/admin/tambah", [DataPengurusController::class, "tambah"]);
Route::get("/admin/{id}/form_edit_pengurus", [DataPengurusController::class, "form_edit_pengurus"]);
Route::post("/admin/update", [DataPengurusController::class, "update"]);

Route::get("/admin/divisi", [DivisiController::class, "divisi"]);
Route::get("/admin/tambahdivisi", [DivisiController::class, "tambahdivisi"]);
Route::post("/admin/tambahdiv", [DivisiController::class, "tambahdiv"]);
Route::delete("/deletedivisi/{id}", [DivisiController::class, "delete"]);
Route::get("/admin/editdivisi/{id}", [DivisiController::class, "edit"]);
Route::post("/admin/simpandivisi", [DivisiController::class, "update"]);

Route::get("/admin/jabatan", [JabatanController::class, "jabatan"]);
Route::get("/admin/tambahjabatan", [JabatanController::class, "tambahjabatan"]);
Route::post("/admin/tambahjab", [JabatanController::class, "tambahjab"]);
Route::delete("/deletejabatan/{id}", [JabatanController::class, "delete"]);
Route::get("/admin/editjabatan/{id}", [JabatanController::class, "edit"]);
Route::post("/admin/simpanjabatan", [JabatanController::class, "update"]);

Route::get("/admin/prodi", [ProdiController::class, "prodi"]);
Route::get("/admin/tambahprodi", [ProdiController::class, "tambahprodi"]);
Route::post("/admin/tambahpro", [ProdiController::class, "tambahpro"]);
Route::delete("/deleteprodi/{id}", [ProdiController::class, "delete"]);
Route::get("/admin/editprodi/{id}", [ProdiController::class, "edit"]);
Route::post("/admin/simpanprodi", [ProdiController::class, "update"]);

Route::get("/admin/jurusan", [JurusanController::class, "jurusan"]);
Route::get("/admin/tambahjurusan", [JurusanController::class, "tambahjurusan"]);
Route::post("/admin/tambahjur", [JurusanController::class, "tambahjur"]);
Route::delete("/deletejurusan/{id}", [JurusanController::class, "delete"]);
Route::get("/admin/editjurusan/{id}", [JurusanController::class, "edit"]);
Route::post("/admin/simpanjurusan", [JurusanController::class, "update"]);

Route::get("/admin/ketpanitia", [KeteranganPanitiaController::class, "ketpanitia"]);
Route::get("/admin/tambahketpanitia", [KeteranganPanitiaController::class, "tambahketpanitia"]);
Route::post("/admin/tambahpan", [KeteranganPanitiaController::class, "tambahpan"]);
Route::delete("/deleteketpanitia/{id}", [KeteranganPanitiaController::class, "delete"]);
Route::get("/admin/editketpanitia/{id}", [KeteranganPanitiaController::class, "edit"]);
Route::post("/admin/simpanketpanitia", [KeteranganPanitiaController::class, "update"]);

Route::get("/admin/acara", [AcaraController::class, "daftaracara"]);
Route::get("/admin/tambah_acara", [AcaraController::class, "tambahacara"]);
Route::post("/admin/addacara", [AcaraController::class, "addacara"]);
Route::delete("/deleteacara/{id}", [AcaraController::class, "delete"]);
Route::get("/admin/editacara/{id}", [AcaraController::class, "edit"]);
Route::post("/admin/simpanacara", [AcaraController::class, "update"]);

Route::get("/admin/acara/{acara}/absensi", [AcaraAbsensiController::class, "absensi"]);
Route::get("/admin/acara/{acara}/tambah_absen", [AcaraAbsensiController::class, "tambah"]);
Route::post("/admin/acara/{acara}/absensi", [AcaraAbsensiController::class, "simpan"]);
Route::delete("/deleteacara/{id}", [AcaraAbsensiController::class, "hapus"]);
Route::get("/admin/acara/{id}/edit_absensi", [AcaraAbsensiController::class, "edit"]);
Route::post("/admin/simpanabsen", [AcaraAbsensiController::class, "update"]);

Route::get("/admin/acara/{acara}/panitia", [PanitiaAcaraController::class, "daftarpanitia"]);
Route::get("/admin/acara/{acara}/tambah_panitia", [PanitiaAcaraController::class, "tambah"]);
Route::post("/admin/acara/{acara}/panitia", [PanitiaAcaraController::class, "simpan"]);
Route::delete("/deletepanitia/{id}", [PanitiaAcaraController::class, "hapus"]);
Route::get("/admin/acara/{id}/edit_panitia", [PanitiaAcaraController::class, "edit"]);
Route::post("/admin/simpanpanitia", [PanitiaAcaraController::class, "update"]);
Route::post("/admin/finalpanitia/{id}", [PanitiaAcaraController::class, "final"]);

Route::post('/tambah/oprec', [OprecController::class, "tambahOprec"]);
Route::get('test', [OprecController::class, "test"]);
Route::post('/oprecditerima/{id}/{no_telp}', [OprecController::class, "diterima"]);
Route::post('/oprecditolak/{id}/{no_telp}', [OprecController::class, "ditolak"]);
Route::delete("/deleteoprec/{id}", [OprecController::class, "hapus"]);


//TampilPengurus
Route::get('/pengurus', [LandingPengurusController::class, "home"])->middleware('auth');
Route::get('/logout', [LandingPengurusController::class, "logout"]);
Route::get('/visidanmisi', [LandingPengurusController::class, "visidanmisi"]);
Route::get('/strukturpengurus', [LandingPengurusController::class, "strukturpengurus"]);
Route::get('/acara/{id}/absensi', [LandingPengurusController::class, "absensi"]);
Route::get('/acara/{id}/kepanitiaan', [LandingPengurusController::class, "kepanitiaan"]);
Route::get('/pageacara', [LandingPengurusController::class, "nama_acara"]);
Route::post('/acara/{id}/kepanitiaan', [LandingPengurusController::class, "submitpanitia"]);
Route::post('/acara/{id}/absensi', [LandingPengurusController::class, "submitabsen"]);
