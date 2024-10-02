<?php

use App\Http\Controllers\DashboardController;
use App\Http\Controllers\LoginController;
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

Route::get('/main', [DashboardController::class, 'main'])->name('main');
Route::post('tambah-sertifs', [DashboardController::class, 'tambah'])->name('tambah-sertif');
Route::post('/hapus-sertif', [DashboardController::class, 'hapus'])->name('hapus-sertif');
Route::post('/edit-sertif', [DashboardController::class, 'edit'])->name('edit-sertif');

// Route::get('/upload', [DashboardController::class, 'upload'])->name('upload');
// Route::post('/uploadproses', [DashboardController::class, 'uploadproses'])->name('uploadproses');

Route::group(['middleware' => ['auth']], function() {
    Route::get('/logout', [LoginController::class, 'logout'])->name('logout');
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');


});
