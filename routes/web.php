<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\AdministrasiController;
use App\Http\Controllers\AnggotaController;
use App\Http\Controllers\PengurusController;
use App\Http\Controllers\KegiatanController;
use App\Http\Controllers\KeuanganController;
use App\Http\Controllers\LaporanController;

Route::get('/', function () {
    $kegiatan = \App\Models\Kegiatan::where('status', 'Aktif')->latest()->get();
    $pengurus = \App\Models\Pengurus::with('anggota')->where('status', 'Aktif')->latest()->get();
    return view('welcome', compact('kegiatan', 'pengurus'));
});

Route::get('/login', [AuthController::class, 'showLogin'])->name('login');
Route::post('/login', [AuthController::class, 'login']);
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

Route::middleware('auth')->group(function () {
    Route::get('/admin/dashboard', [AuthController::class, 'dashboard'])->name('admin.dashboard');

    Route::resource('/admin/user', UserController::class)->names([
        'index' => 'admin.user.index',
        'create' => 'admin.user.create',
        'store' => 'admin.user.store',
        'show' => 'admin.user.show',
        'edit' => 'admin.user.edit',
        'update' => 'admin.user.update',
        'destroy' => 'admin.user.destroy',
    ]);

    Route::resource('/admin/anggota', AnggotaController::class)->parameters([
        'anggota' => 'anggota',
    ])->names([
        'index' => 'admin.anggota.index',
        'create' => 'admin.anggota.create',
        'store' => 'admin.anggota.store',
        'show' => 'admin.anggota.show',
        'edit' => 'admin.anggota.edit',
        'update' => 'admin.anggota.update',
        'destroy' => 'admin.anggota.destroy',
    ]);

    Route::post('/admin/anggota/{anggota}/create-user', [AnggotaController::class, 'createUser'])
        ->name('admin.anggota.create-user');
    Route::post('/admin/anggota/{anggota}/reset-password', [AnggotaController::class, 'resetPassword'])
        ->name('admin.anggota.reset-password');

    Route::resource('/admin/pengurus', PengurusController::class)->parameters([
        'pengurus' => 'pengurus',
    ])->names([
        'index' => 'admin.pengurus.index',
        'create' => 'admin.pengurus.create',
        'store' => 'admin.pengurus.store',
        'show' => 'admin.pengurus.show',
        'edit' => 'admin.pengurus.edit',
        'update' => 'admin.pengurus.update',
        'destroy' => 'admin.pengurus.destroy',
    ]);

    Route::resource('/admin/kegiatan', KegiatanController::class)->parameters([
        'kegiatan' => 'kegiatan',
    ])->names([
        'index' => 'admin.kegiatan.index',
        'create' => 'admin.kegiatan.create',
        'store' => 'admin.kegiatan.store',
        'show' => 'admin.kegiatan.show',
        'edit' => 'admin.kegiatan.edit',
        'update' => 'admin.kegiatan.update',
        'destroy' => 'admin.kegiatan.destroy',
    ]);

    Route::resource('/admin/administrasi', AdministrasiController::class)->parameters([
        'administrasi' => 'administrasi',
    ])->names([
        'index' => 'admin.administrasi.index',
        'create' => 'admin.administrasi.create',
        'store' => 'admin.administrasi.store',
        'show' => 'admin.administrasi.show',
        'edit' => 'admin.administrasi.edit',
        'update' => 'admin.administrasi.update',
        'destroy' => 'admin.administrasi.destroy',
    ]);

    Route::resource('/admin/keuangan', KeuanganController::class)->parameters([
        'keuangan' => 'keuangan',
    ])->names([
        'index' => 'admin.keuangan.index',
        'create' => 'admin.keuangan.create',
        'store' => 'admin.keuangan.store',
        'show' => 'admin.keuangan.show',
        'edit' => 'admin.keuangan.edit',
        'update' => 'admin.keuangan.update',
        'destroy' => 'admin.keuangan.destroy',
    ]);

    // Laporan routes
    Route::get('/admin/laporan', [LaporanController::class, 'index'])->name('admin.laporan.index');
    Route::get('/admin/laporan/kegiatan/export', [LaporanController::class, 'exportKegiatan'])->name('admin.laporan.export.kegiatan');
    Route::get('/admin/laporan/administrasi/export', [LaporanController::class, 'exportAdministrasi'])->name('admin.laporan.export.administrasi');
    Route::get('/admin/laporan/keuangan/export', [LaporanController::class, 'exportKeuangan'])->name('admin.laporan.export.keuangan');
    Route::get('/admin/laporan/anggota/export', [LaporanController::class, 'exportAnggota'])->name('admin.laporan.export.anggota');
    Route::get('/admin/laporan/pengurus/export', [LaporanController::class, 'exportPengurus'])->name('admin.laporan.export.pengurus');
});
