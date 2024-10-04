<?php

use App\Http\Controllers\CsrController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\HseController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\SertifikatController;
use App\Http\Controllers\UserController;
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
Route::post('/edit-sertif', [SertifikatController::class, 'edit'])->name('edit-sertif');

Route::get('/csr', [CsrController::class, 'index'])->name('csr');
Route::get('/hse', [HseController::class, 'index'])->name('hse');

Route::get('/user', [UserController::class, 'main'])->name('user');
Route::post('/tambah-akun', [UserController::class, 'tambah'])->name('tambah-akun');
Route::post('/hapus-akun', [UserController::class, 'hapus'])->name('hapus-akun');

// Route::get('/upload', [DashboardController::class, 'upload'])->name('upload');
// Route::post('/uploadproses', [DashboardController::class, 'uploadproses'])->name('uploadproses');

Route::group(['middleware' => ['auth']], function() {
    Route::get('/logout', [LoginController::class, 'logout'])->name('logout');
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');


});
