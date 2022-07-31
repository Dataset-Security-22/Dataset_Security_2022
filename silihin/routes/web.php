<?php

use Illuminate\Support\Facades\Route;

use App\Models\Kendaraan;

use App\Http\Controllers\KendaraanController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\PesananController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\SearchController;
use App\Http\Controllers\AjaxController;
use App\Http\Controllers\PinjamanController;
use App\Http\Controllers\PenyewaanController;
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
	return view('template.first');
});

// Route Auth
Route::prefix('auth')->group(function () {
	// Route Authentication
	Route::post('/login', [AuthController::class, 'login']);
	Route::post('/register', [AuthController::class, 'register']);

	// Route Google
	Route::post('/forgot-password', [AuthController::class, 'forgotPassword']);
	Route::get('/reset', [AuthController::class, 'reset']);
	Route::get('/verify', [AuthController::class, 'verify']);
	Route::get('/google', [AuthController::class, 'google']);
	Route::get('/google/callback', [AuthController::class, 'google_callback']);
	Route::get('/logout', [AuthController::class, 'logout']);
});

// Route Kendaraan
Route::resource('kendaraan', KendaraanController::class)->middleware('otentikasi');
Route::post('kendaraan/{id}/pesan_{invoice}', [KendaraanController::class, 'pesan'])->middleware('otentikasi');
Route::get('/get/kendaraan-by-user', [KendaraanController::class, 'getByKendaraanUser']);

// Route Pesanan
Route::prefix('pesanan')->group(function() {
	Route::get('/', [PesananController::class, 'index'])->middleware('otentikasi');
	Route::post('/', [PesananController::class, 'store'])->middleware('otentikasi');
	Route::get('/get-all-pemilik', [PesananController::class, 'getallpemilik'])->middleware('otentikasi');
});

// Route Profile
Route::prefix('profile')->group(function () {
	Route::get('/', [ProfileController::class, 'index'])->middleware('otentikasi');
	Route::patch('/', [ProfileController::class, 'profileUpdate'])->middleware('otentikasi');
	Route::post('/telepon', [ProfileController::class, 'teleponUpdate'])->middleware('otentikasi');
});

Route::prefix('search')->group(function () {
	Route::get('/', [SearchController::class, 'searchKendaraanAll']);
	Route::get('/kendaraan', [SearchController::class, 'searchKendaraan']);
});

Route::prefix('get')->group(function () {
	Route::get('/kendaraan-all', [AjaxController::class, 'getAllKendaraan']);
	Route::get('/kendaraan-by-{id}', [AjaxController::class, 'getByKendaraanId']);
	Route::post('/kendaraan-by', [AjaxController::class, 'getByKendaraan']);
});

Route::prefix('pinjaman')->group(function () {
	Route::get('/', [PinjamanController::class, 'index'])->middleware('otentikasi');
	Route::get('/kendaraan-by-me', [PinjamanController::class, 'showall'])->middleware('otentikasi');
	Route::get('/kendaraan-by-me/tolak', [PinjamanController::class, 'tolakcount'])->middleware('otentikasi');
	Route::get('/kendaraan-by-me/selesai', [PinjamanController::class, 'selesaicount'])->middleware('otentikasi');
	Route::patch('/tolak', [PinjamanController::class, 'tolak'])->middleware('otentikasi');
	Route::patch('/setuju', [PinjamanController::class, 'setuju'])->middleware('otentikasi');
	Route::patch('/selesai', [PinjamanController::class, 'selesai'])->middleware('otentikasi');
});

Route::prefix('penyewaan')->group(function () {
	Route::get('/', [PenyewaanController::class, 'index'])->middleware('otentikasi');
	Route::get('/kendaraan-by-me', [PenyewaanController::class, 'showall'])->middleware('otentikasi');
});