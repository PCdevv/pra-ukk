<?php

use App\Http\Controllers\BarangController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\LaporanController;
use App\Http\Controllers\LelangController;
use App\Http\Controllers\PenawaranController;
use App\Http\Controllers\ProfileController;
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

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', [DashboardController::class, 'index'])->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth', 'masyarakat')->group(function () {
    Route::get('/lelang/my', [PenawaranController::class, 'show_by_masyarakat'])->name('lelang.saya');
    Route::get('/lelang/{barang}', [PenawaranController::class, 'detail'])->name('lelang.detail');
    Route::post('/lelang/{barang}', [PenawaranController::class, 'tawarkan'])->name('lelang.tawarkan');
    Route::get('/lelang/{barang}/edit', [PenawaranController::class, 'edit_tawaran'])->name('lelang.edit-tawaran');
    Route::patch('/lelang/{barang}', [PenawaranController::class, 'update_tawaran'])->name('lelang.update-tawaran');
});

Route::middleware('auth', 'petugas')->group(function () {
    Route::prefix('data')->group(function () {
        Route::resource('lelang', LelangController::class)->only('index', 'show');
        Route::patch('/lelang/buka/{lelang}', [LelangController::class, 'buka'])->name('lelang.buka');
        Route::patch('/lelang/tutup/{lelang}', [LelangController::class, 'tutup'])->name('lelang.tutup');
    });
});

Route::middleware('auth', 'admin-petugas')->group(function () {
    Route::prefix('data')->group(function () {
        Route::resource('barang', BarangController::class);
        Route::get('/laporan-lelang', [LaporanController::class, 'laporan_lelang'])->name('laporan.lelang');
        Route::get('/laporan-penawaran', [LaporanController::class, 'laporan_penawaran'])->name('laporan.penawaran');
        Route::get('/laporan-export-excel', [LaporanController::class, 'exportExcelLelang'])->name('lelang-export-excel');
        Route::get('/penawaran-export-excel', [LaporanController::class, 'exportExcelPenawaran'])->name('penawaran-export-excel');
    });
});

Route::middleware('auth', 'admin')->group(function () {
    Route::prefix('data')->group(function () {
        Route::get('/user/{level}', [UserController::class, 'index'])->name('user.index');
        Route::get('/user/{level}/create', [UserController::class, 'create'])->name('user.create');
        Route::post('/user/{level}', [UserController::class, 'store'])->name('user.store');
        Route::get('/user/{level}/{id_user}', [UserController::class, 'edit'])->name('user.edit');
        Route::patch('/user/{level}/{id_user}', [UserController::class, 'update'])->name('user.update');
        Route::delete('/user/{level}/{id_user}', [UserController::class, 'destroy'])->name('user.destroy');
    });
});

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__ . '/auth.php';
