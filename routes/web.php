<?php

use App\Http\Controllers\DashboardController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\SertifikatController;
use App\Http\Controllers\UserController;
use App\Models\User;
use Illuminate\Support\Facades\Route;

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

Route::get('/', function () {return view('login');})->name('login');
Route::post('/proses', [LoginController::class, 'login'])->name('proses');
// Route::get('/sertif', [DashboardController::class, 'sertif'])->name('sertif');

Route::get('/main', [SertifikatController::class, 'main'])->name('main');
Route::post('/tambah-sertif', [SertifikatController::class, 'tambah'])->name('tambah-sertif');
Route::post('/hapus-sertif', [SertifikatController::class, 'hapus'])->name('hapus-sertif');
Route::post('/edit-sertif/{idsertif}', [SertifikatController::class, 'edit'])->name('edit-sertif');

Route::get('/user', [UserController::class, 'index'])->name('user');
Route::post('/tambah-user', [UserController::class, 'tambah'])->name('tambah-user');
Route::post('/hapus-user', [UserController::class, 'hapus'])->name('hapus-user');
Route::post('/edit-user', [UserController::class, 'edit'])->name('edit-user');

// Route::get('/upload', [DashboardController::class, 'upload'])->name('upload');
// Route::post('/uploadproses', [DashboardController::class, 'uploadproses'])->name('uploadproses');

Route::group(['middleware' => ['auth']], function() {
    Route::get('/logout', [LoginController::class, 'logout'])->name('logout');
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');


});
