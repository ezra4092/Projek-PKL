<?php

use App\Http\Controllers\DashboardController;
use App\Http\Controllers\IsoController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\SertifController;
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

Route::group(['middleware' => ['auth']], function() {
    Route::get('/logout', [LoginController::class, 'logout'])->name('logout');

    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');
    Route::post('/tambah-sertif', [SertifikatController::class, 'tambah'])->name('tambah-sertif');
    Route::post('/hapus-sertif', [SertifikatController::class, 'hapus'])->name('hapus-sertif');
    Route::post('/edit-sertif', [SertifikatController::class, 'edit'])->name('edit-sertif');

    Route::get('/user', [UserController::class, 'index'])->name('user');
    Route::post('/tambah-user', [UserController::class, 'tambah'])->name('tambah-user');
    Route::post('/hapus-user', [UserController::class, 'hapus'])->name('hapus-user');
    Route::post('/edit-user', [UserController::class, 'edit'])->name('edit-user');

    Route::get('/csr', [SertifController::class, 'csr'])->name('csr');
    Route::get('/hse', [SertifController::class, 'hse'])->name('hse');
    Route::get('/penghargaan', [SertifController::class, 'penghargaan'])->name('penghargaan');
    Route::get('/proper', [SertifController::class, 'proper'])->name('proper');
    Route::get('/swa', [SertifController::class, 'swa'])->name('swa');
    Route::get('/sni_award', [SertifController::class, 'sni_award'])->name('sni_award');

    Route::get('/iso1', [IsoController::class, 'iso1'])->name('iso1');
    Route::get('/iso2', [IsoController::class, 'iso2'])->name('iso2');
    Route::get('/iso3', [IsoController::class, 'iso3'])->name('iso3');
    Route::get('/iso4', [IsoController::class, 'iso4'])->name('iso4');
    Route::get('/iso5', [IsoController::class, 'iso5'])->name('iso5');
    Route::get('/iso6', [IsoController::class, 'iso6'])->name('iso6');

    Route::get('/documentation', [DashboardController::class, 'documentation'])->name('documentation');
    Route::get('/eror', [DashboardController::class, 'eror'])->name('eror');

});
