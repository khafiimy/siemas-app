<?php

use App\Http\Controllers\DashboardController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\PengaduanController;
use App\Http\Controllers\UserController;
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

Route::get('/', function () {
    return view('welcome');
});

Route::get('/layanan-pengaduan', function () {
    return view('layananPengaduan');
});

Route::get('auth', [LoginController::class, 'index'])->name('login');
Route::post('login', [LoginController::class, 'proses_login']);
Route::post('logout', [LoginController::class, 'proses_logout']);


Route::group(['middleware' => ['auth']], function () {
    Route::get('dashboard', [DashboardController::class, 'index']);
    // 
    Route::post('tambah-pengaduan', [PengaduanController::class, 'pengaduanTambah']);

    // 
    Route::get('pengaduan-masuk', [PengaduanController::class, 'pengaduanMasuk']);
    Route::get('pengaduan-masuk-detail-{id}', [PengaduanController::class, 'pengaduanMasukDetail']);

    Route::get('arsip-pengaduan', [PengaduanController::class, 'pengaduanArsip']);
    Route::get('arsip-pengaduan-detail-{id}', [PengaduanController::class, 'pengaduanArsipDetail']);

    // 

    Route::get('pengaduan-ketua', [PengaduanController::class, 'pengaduanKetua']);
    Route::get('pengaduan-wakil-1', [PengaduanController::class, 'pengaduanWakil1']);
    Route::get('pengaduan-wakil-2', [PengaduanController::class, 'pengaduanWakil2']);
    Route::get('pengaduan-wakil-3', [PengaduanController::class, 'pengaduanWakil3']);

    Route::get('pengaduan-komisi-1', [PengaduanController::class, 'pengaduanKomisi1']);
    Route::get('pengaduan-komisi-2', [PengaduanController::class, 'pengaduanKomisi2']);
    Route::get('pengaduan-komisi-3', [PengaduanController::class, 'pengaduanKomisi3']);
    Route::get('pengaduan-komisi-4', [PengaduanController::class, 'pengaduanKomisi4']);

    Route::get('pengaduan-detail-{id}', [PengaduanController::class, 'pengaduanDetail']);
    Route::put('pengaduan-teruskan-{id}', [PengaduanController::class, 'pengaduanTeruskan']);
    Route::put('pengaduan-hasil-{id}', [PengaduanController::class, 'pengaduanHasil']);
    Route::put('pengaduan-konfirmasi-{id}', [PengaduanController::class, 'pengaduanKonfirmasi']);
    Route::delete('pengaduan-hapus-{id}', [PengaduanController::class, 'pengaduanHapus']);

    Route::get('user', [UserController::class, 'index']);
    Route::get('user-tambah', [UserController::class, 'add']);
    Route::post('user-simpan', [UserController::class, 'save']);
    Route::delete('user-hapus-{id}', [UserController::class, 'delete']);
});
