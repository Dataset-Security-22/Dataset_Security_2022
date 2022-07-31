<?php
use Illuminate\Auth\Events\Login;

use App\Http\Controllers\AdminController;
use App\Http\Controllers\SkuController;
use App\Http\Controllers\SktmController;
use App\Http\Controllers\SkdController;
use App\Http\Controllers\AppController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\LogoutController;
use App\Http\Controllers\RegisterController;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LandingController;
use App\Http\Controllers\PendudukController;
use App\Http\Controllers\Edit_ProfilController;
use App\Http\Controllers\akunController;
use App\Http\Controllers\FormulirskdController;
use App\Http\Controllers\FormulirskuController;
use App\Http\Controllers\FormulirsktmController;
use App\Http\Controllers\LayananController;

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

Route::get("/dashboard", [AppController::class, "dashboard"] );

Route::get("/home", [AdminController::class, "index"]);
Route::get("/app", [AppController::class, "app"] );


Route::group(["middleware" => "admin"], function () {
    Route::get("/template", function() {
        return view("/template/layout");
    });
});
Route::get("/login", [LoginController::class, "index"])->middleware("guest");

Route::get("/register", [RegisterController::class, "index"]);

Route::post("/register_cek", [RegisterController::class, "cek"]);

Route::get("/sku", [SkuController::class, "index"]);

//Route::resources("skd", [SkdController]);

Route::prefix("skd")->group(function() {
    Route::get("/", [SkdController::class, "index"]);
    Route::get("/form_tambah_skd", [SkdController::class, "form_tambah_skd"]);

});
Route::post("tambah_skd", [SkdController::class, "proses_tambah_skd"]);


// Route::prefix("sktm")->group(function() {
//     Route::get("/", [SktmController::class, "index"]);
//     Route::get("/form_tambah_sktm", [SktmController::class, "form_tambah_sktm"]);
//     Route::get("/sktm/{id}/hapus", [SktmController::class, "destroy"]);
// });
Route::get("sktm/form_tambah_sktm", [SktmController::class, "form_tambah_sktm"]);
Route::post("tambah_sktm", [SktmController::class, "proses_tambah_sktm"]);
Route::post('/sktm/rekap', [SktmController::class, 'rekap']);

Route::get("sku/form_tambah_sku", [SkuController::class, "form_tambah_sku"]);
Route::post("tambah_sku", [SkuController::class, "proses_tambah_sku"]);


// Route::get("sku/tambah", [SkuController::class, "surat"]);

Route::get("/form_tambah_penduduk", [PendudukController::class, "form_tambah_penduduk"]);
Route::post("tambah_penduduk", [PendudukController::class, "proses_tambah_penduduk"]);



Route::get("/sktm", [SktmController::class, "index"]);
// Route::get("/sktm", [Skttroller::class, "indmConex"]);
Route::get("/skd/{id}/hapus", [SkdController::class, "destroy"]);
Route::post('/skd/rekap', [SkdController::class, 'rekap']);

Route::get("/sktm/{id}/hapus", [SktmController::class, "destroy"]);
Route::get("/sku/{id}/hapus", [SkuController::class, "destroy"]);
Route::post('/sku/rekap', [SkuController::class, 'rekap']);

Route::get("/penduduk", [PendudukController::class, "index"]);
Route::get("/penduduk/{id}/hapus", [PendudukController::class, "destroy"]);

Route::post("/login_cek", [LoginController::class, "cek"]);

Route::get("/logout", [LogoutController::class, "index"])->middleware("admin");

Route::get("/landing", [LandingController::class, "index"]);

Route::get("/akun", [akunController::class, "index"]);
Route::get("/akun/{id}/hapus", [akunController::class, "destroy"]);

Route::get("/editprofil/{id}", [Edit_ProfilController::class, "index"]);

Route::get("/editsurat", [editsuratController::class, "index"]);

Route::put('user/{id}', [Edit_ProfilController::class, "edit"]);

Route::get('/skd/edit/{id}', [SkdController::class, "tampilan"]);
Route::post('/skd/update/{id}', [SkdController::class, "edit"]);
Route::get("/formulirskd", [FormulirskdController::class, "index"])->name('formulir');
Route::post("formulir_skd", [FormulirskdController::class, "formulir"]);
// Route::get("namaskd",   [FormulirskdController::class, "namaskd"]);

Route::get('/sktm/edit/{id}', [SktmController::class, "tampilan"]);
Route::post('/sktm/update/{id}', [SktmController::class, "edit"]);
Route::get("/formulirsktm", [FormulirsktmController::class, "index"])->name('formulir');
Route::post("formulir_sktm", [FormulirsktmController::class, "formulir"]);
Route::get("namasktm",   [FormulirsktmController::class, "namasktm"]);
// Route::get("namasktm",   [SktmController::class, "namasktm"]);

Route::get('/sku/edit/{id}', [SkuController::class, "tampilan"]);
Route::post('/sku/update/{id}', [SkuController::class, "edit"]);
Route::get("/formulirsku", [FormulirskuController::class, "index"])->name('formulir');
Route::post("formulir_sku", [FormulirskuController::class, "formulir"]);
Route::get("namasku",   [FormulirskuController::class, "namasku"]);

Route::get('/penduduk/edit/{id}', [PendudukController::class, "tampilan"]);
Route::post('/penduduk/update/{id}', [PendudukController::class, "edit"]);

Route::get("/Layanan", [LayananController::class, "index"]);
