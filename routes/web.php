<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\UsersController;
use App\Http\Controllers\AuthController;

use App\Http\Controllers\DashboardController;
use App\Http\Controllers\BarangController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\TransaksiController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

/*Route::get('/', function () {
    return view('dashboard');
})->middleware('auth');*/
Route::get('/', [DashboardController::class, 'index'])->middleware('auth');
Route::get('/login', [AuthController::class, 'index'])->name('login');
Route::post('/login', [AuthController::class, 'authenticate']);
Route::get('/logout', [AuthController::class, 'logout'])->middleware('auth');

// Route Users
Route::get('/users', [UsersController::class, 'index'])->name('user.index');
Route::any('/usersstore', [UsersController::class, 'store']);
Route::get('/users-add', [UsersController::class, 'add']);
Route::any('/users-edit/{id}', [UsersController::class, 'edit']);
Route::any('/users-delete/{id}', [UsersController::class, 'delete']);


//Route category
Route::get('/category', [CategoryController::class, 'index'])->name('category.index');
Route::any('/categorystore', [CategoryController::class, 'store']);
Route::get('/category-add', [CategoryController::class, 'add']);
Route::any('/category-edit/{id}', [CategoryController::class, 'edit']);
Route::any('/category-delete/{id}', [CategoryController::class, 'delete']);
Route::any('/selectcategory', [CategoryController::class, 'selectCategory']);


//Route Barang
Route::get('/barang', [BarangController::class, 'index'])->name('barang.index');
Route::any('/barangstore', [BarangController::class, 'store']);
Route::get('/barang-add', [BarangController::class, 'add']);
Route::any('/barang-edit/{id}', [BarangController::class, 'edit']);
Route::any('/barang-delete/{id}', [BarangController::class, 'delete']);



//Route Transaksi
Route::get('/transaksi', [TransaksiController::class, 'index'])->name('transaksi.index');
Route::any('/transaksistore', [TransaksiController::class, 'store']);
Route::get('/transaksi-add', [TransaksiController::class, 'add']);
Route::any('/transaksi-edit/{id}', [TransaksiController::class, 'edit']);
Route::any('/transaksi-delete/{id}', [TransaksiController::class, 'delete']);

Route::any('/chooseproduct', [TransaksiController::class, 'choose']);



