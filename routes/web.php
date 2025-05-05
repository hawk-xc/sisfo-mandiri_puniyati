<?php

use App\Http\Controllers\WelcomeController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\Admin\LaporanController;
use App\Http\Controllers\Admin\PemeriksaanController;
use App\Http\Controllers\dash\BidanController;
use App\Http\Controllers\dash\ObatController;
use App\Http\Controllers\dash\PasienController;
use App\Http\Controllers\dash\PelayananController;
use App\Http\Controllers\dash\PembayaranController;
use App\Http\Controllers\dash\PendaftaranController;
use App\Models\Pemeriksaan;
use Illuminate\Support\Facades\Route;


Route::get('/', WelcomeController::class)->name('landingpage');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::group([
    'prefix' => 'dashboard',
    'middleware' => ['auth'],
], function () {
    Route::get('/', [DashboardController::class, 'index'])->name('dashboard');

    // Masterdata
    Route::group(['prefix' => 'masterdata'], function() {
        Route::resource('/bidan', BidanController::class);
        Route::resource('/pasien', PasienController::class);
        Route::resource('/obat', ObatController::class);
        Route::resource('/pelayanan', PelayananController::class);
    });

    Route::resource('pendaftaran', PendaftaranController::class);
    Route::resource('pemeriksaan', PemeriksaanController::class);
    Route::resource('pembayaran', PembayaranController::class);
    Route::resource('laporan', LaporanController::class);

    // Route::resource('/laporan', LaporanController::class)->names([
        // 'index' => 'laporan.index',
    // ])->middleware('role:kader|admin');

    Route::group(['prefix' => 'laporan'], function () {
        Route::get('/data/pemeriksaan', [LaporanController::class, 'pemeriksaan_data'])->name('laporan.data.pemeriksaan');
        Route::get('/data/pj', [LaporanController::class, 'pj_data'])->name('laporan.data.pj');
        Route::get('/data/kader', [LaporanController::class, 'kader_data'])->name('laporan.data.kader');
        Route::get('/data/lansia', [LaporanController::class, 'lansia_data'])->name('laporan.data.lansia');

        Route::get('/export/{type}', [LaporanController::class, 'export'])
            ->name('laporan.export');
    });
});


require __DIR__ . '/auth.php';
