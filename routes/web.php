<?php

use App\Http\Controllers\DenzibangController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\KesatuanController;
use App\Http\Controllers\LapjusikController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\MinadaController;
use App\Http\Controllers\RehabController;
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

// Login - SIWAS
Route::get('/', [HomeController::class, 'index'])->name('home');

Route::get('/login-siwas', [AuthController::class, 'siwas'])->name('login.siwas');
Route::post('/login-siwas/proses', [AuthController::class, 'login_proses'])->name('login.proses');
Route::get('/register-siwas', [AuthController::class, 'register'])->name('register.siwas');
Route::post('/register-siwas/proses', [AuthController::class, 'register_proses'])->name('register.proses');

Route::get('/login-denzibang', [AuthController::class, 'denzibang'])->name('login.denzibang');
Route::post('/login-denzibang/proses', [AuthController::class, 'login_denzibang_proses'])->name('login.proses.denzibang');

Route::get('/register-denzibang', [AuthController::class, 'register_denzibang'])->name('register.denzibang');
Route::post('/register-denzibang/proses', [AuthController::class, 'register_denzibang_proses'])->name('denzibang.proses');

Route::get('/login-minada', [AuthController::class, 'minada'])->name('login.minada');
Route::post('/login-minada/proses', [AuthController::class, 'login_minada_proses'])->name('login.proses.minada');

Route::get('/register-minada', [AuthController::class, 'register_minada'])->name('register.minada');
Route::post('/register-minada/proses', [AuthController::class, 'register_minada_proses'])->name('register.minada.proses');

Route::middleware(['auth:minada'])->group(function () {
  Route::get('/minada', [MinadaController::class, 'index'])->name('minada');
  Route::get('/minada/export', [MinadaController::class, 'export'])->name('minada.export');
  Route::get('/minada/print', [MinadaController::class, 'print'])->name('minada.print');
  Route::post('/minada/logout', [AuthController::class, 'logout_minada'])->name('logout.minada');
});

Route::middleware(['auth:siwas'])->group(function () {
  Route::get('/siwas', [RehabController::class, 'index'])->name('siwas');
  Route::get('/siwas/rehab', [RehabController::class, 'rehab'])->name('rehab.index');
  Route::get('/siwas/cetak', [RehabController::class, 'cetak'])->name('rehab.cetak');
  Route::get('/siwas/show/{id}', [RehabController::class, 'show'])->name('rehab.show');
  Route::get('/siwas/edit/{id}', [RehabController::class, 'edit'])->name('rehab.edit');
  Route::get('/siwas/export/{id}', [RehabController::class, 'export'])->name('rehab.export');
  Route::post('/siwas/store', [RehabController::class, 'store'])->name('rehab.store');
  Route::put('/siwas/update/{id}', [RehabController::class, 'update'])->name('rehab.update');
  Route::delete('/siwas/delete/{id}', [RehabController::class, 'delete'])->name('rehab.delete');
  Route::post('/siwas/logout', [AuthController::class, 'logout_siwas'])->name('logout.siwas');
  Route::get('/siwas/print', [RehabController::class, 'print'])->name('rehab.print');

  // SIWAS - Kesatuan
  Route::get('/siwas/kesatuan', [KesatuanController::class, 'kesatuan'])->name('kesatuan.index');
  Route::post('/siwas/kesatuan/store', [KesatuanController::class, 'store'])->name('kesatuan.store');
  Route::get('/siwas/kesatuan/edit/{id}', [KesatuanController::class, 'edit'])->name('kesatuan.edit');
  Route::put('/siwas/kesatuan/update/{id}', [KesatuanController::class, 'update'])->name('kesatuan.update');
  Route::delete('/siwas/kesatuan/delete/{id}', [KesatuanController::class, 'delete'])->name('kesatuan.delete');

  // SIWAS - Lapjusik
  Route::get('/siwas/lapjusik', [LapjusikController::class, 'lapjusik'])->name('lapjusik.index');
  Route::get('/siwas/lapjusik/download-gambar/{id}', [LapjusikController::class, 'download'])->name('lapjusik.download');
});

Route::middleware(['auth:denzibang'])->group(function () {
  Route::get('/denzibang', [DenzibangController::class, 'index'])->name('denzibang');
  Route::get('/denzibang/lapjusik', [DenzibangController::class, 'lapjusik'])->name('denzibang.lapjusik');
  Route::get('/denzibang/lapjusik/edit/{id}', [DenzibangController::class, 'edit'])->name('denzibang.edit');
  Route::put('/denzibang/lapjusik/update/{id}', [DenzibangController::class, 'update'])->name('denzibang.update');
  Route::put('/denzibang/lapjusik/update/gambar/{id}', [DenzibangController::class, 'gambar'])->name('denzibang.gambar');
  Route::post('/denzibang/logout', [AuthController::class, 'logout_denzibang'])->name('logout.denzibang');
});
