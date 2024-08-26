<?php

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

Route::get('/', [App\Http\Controllers\DashboardController::class, 'dashboard']);
Route::get('/detail-product/{id}', [App\Http\Controllers\DashboardController::class, 'detail']);


Route::get('/tes', function () {
    return view('dashboard');
});

Auth::routes();
//Admin
Route::get('admin/home', [App\Http\Controllers\HomeController::class, 'adminHome'])->name('admin.home')->middleware('is_admin');
Route::get('admin/data-produk', [App\Http\Controllers\ProductsController::class, 'show'])->middleware('is_admin');
Route::get('admin/data-produk/delete/{id}', [App\Http\Controllers\ProductsController::class, 'destroy'])->middleware('is_admin');
Route::get('admin/data-produk/update/{id}', [App\Http\Controllers\ProductsController::class, 'update'])->middleware('is_admin');
Route::get('admin/tambah-produk', [App\Http\Controllers\ProductsController::class, 'create'])->middleware('is_admin');
Route::post('/admin/actionaddproduk', [App\Http\Controllers\ProductsController::class, 'store'])->middleware('is_admin');
Route::post('/admin/actionupdateproduk', [App\Http\Controllers\ProductsController::class, 'actionupdate'])->middleware('is_admin');
Route::get('/admin/settingstok', [App\Http\Controllers\ProductsController::class, 'stock'])->middleware('is_admin');
Route::post('/admin/tambah-stock/{id}', [App\Http\Controllers\ProductsController::class, 'addstock'])->middleware('is_admin');
Route::get('/admin/data-transaksi', [App\Http\Controllers\TransaksiController::class, 'indexadmin'])->middleware('is_admin');


//User
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/home/{id}', [App\Http\Controllers\HomeController::class, 'kategori']);
Route::post('/tambah-keranjang/{iduser}/{idproduct}', [App\Http\Controllers\CartController::class, 'store']);
Route::get('/keranjang', [App\Http\Controllers\CartController::class, 'index']);
Route::get('/keranjang/delete/{id}', [App\Http\Controllers\CartController::class, 'destroy']);
Route::get('/checkout', [App\Http\Controllers\TransaksiController::class, 'show']);
Route::post('/checkout/action', [App\Http\Controllers\TransaksiController::class, 'store']);
Route::get('/mytransaksi', [App\Http\Controllers\TransaksiController::class, 'datalist']);
Route::get('/cetaktransaksi/{id}', [App\Http\Controllers\PrintController::class, 'cetak']);
// /cetaktransaksi/{{$item->id}}

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
