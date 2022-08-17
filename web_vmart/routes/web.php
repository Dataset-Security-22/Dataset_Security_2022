<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\PaymentController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\ProductCategoryController;
use App\Http\Controllers\ReviewController;
use App\Http\Controllers\CustomerController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\CouponController;
use App\Http\Controllers\DashboardController;


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



Route::get('/', [HomeController::class, 'index'])->middleware('admin');

Route::get('/kontak', function () {
    return view('admin/kontak');
});
Route::get('/login', [LoginController::class, 'login']);
Route::post('/post_login', [LoginController::class, 'post_login']);
Route::get('/logout', [LoginController::class, 'logout'])->middleware('admin');

Route::get('/kontak', [contactController::class, 'index'])->name('kontak');
Route::get('/pesanan', [orderController::class, 'index'])->middleware('admin');
Route::get('/pesanan/view/{id}', [orderController::class, 'view'])->middleware('admin');


Route::get('/pembayaran', [PaymentController::class, 'index'])->middleware('admin');
Route::get('/pembayaran/view/{id}', [PaymentController::class, 'view'])->middleware('admin');
Route::get('/kategori', [ProductCategoryController::class, 'index'])->name('kategori');
Route::post('/kategori/insert', [ProductCategoryController::class, 'insert']);
Route::get('/kategori/edit/{id}', [ProductCategoryController::class, 'edit']);
Route::post('/kategori/hapus', [ProductCategoryController::class, 'hapus']);
Route::post('/kategori/update', [ProductCategoryController::class, 'update']);

Route::get('/review', [ReviewController::class, 'index']);


Route::get('/pelanggan', [CustomerController::class, 'index']);
Route::get('/pelanggan/delete/{id}', [CustomerController::class, 'delete']);


Route::get('/setting/profile/{id}', [UserController::class, 'edit']);
Route::post('/profile/update', [UserController::class, 'update']);



Route::get('/produk', [productController::class, 'index']);
Route::get('/produk/add', [productController::class, 'add']);
Route::post('/produk/insert', [productController::class, 'insert']);
Route::get('/produk/edit/{id}', [productController::class, 'edit']);
Route::get('/produk/detail/{id}', [productController::class, 'detail']);
Route::post('/produk/update/', [productController::class, 'update']);
Route::get('/produk/hapus/{id}', [productController::class, 'hapus']);

Route::get('/kupon', [CouponController::class, 'index'])->name('kupon');
Route::post('/kupon/insert', [CouponController::class, 'insert']);
Route::get('/kupon/edit/{id}', [CouponController::class, 'edit']);
Route::post('/kupon/hapus', [CouponController::class, 'hapus']);
Route::post('/kupon/update', [CouponController::class, 'update']);
// Route::get('/kupon', [CouponController::class, 'index']);
// Route::get('/kupon', function () {
//     return view('admin/kupon');
// }
// );
