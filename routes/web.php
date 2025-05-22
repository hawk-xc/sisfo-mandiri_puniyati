<?php

use App\Http\Controllers\WelcomeController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\dash\LaporanController;
use App\Http\Controllers\dash\PemeriksaanController;
use App\Http\Controllers\dash\BidanController;
use App\Http\Controllers\dash\ObatController;
use App\Http\Controllers\dash\PasienController;
use App\Http\Controllers\dash\PelayananController;
use App\Http\Controllers\dash\PembayaranController;
use App\Http\Controllers\dash\PendaftaranController;
use App\Models\Pemeriksaan;
use Illuminate\Support\Facades\Route;


Route::get('/', function () {
    return redirect()->route('login');
})->name('landingpage');

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

    Route::get('/datatable/bidan', [BidanController::class, 'datatableAll'])->name('datatable.bidan');
    Route::get('/datatable/pasien', [PasienController::class, 'datatableAll'])->name('datatable.pasien');

    // pemeriksaanObat route group
    Route::post('pemeriksaanobat', [PemeriksaanController::class, 'storePemeriksaanObat'])
        ->name('pemeriksaanobat.store');
    Route::get('pemeriksaanobat/{id}/edit', [PemeriksaanController::class, 'editPemeriksaanObat'])
        ->name('pemeriksaanobat.edit');
    Route::put('pemeriksaanobat/{id}', [PemeriksaanController::class, 'updatePemeriksaanObat'])
        ->name('pemeriksaanobat.update');
    Route::delete('pemeriksaanobat/{id}', [PemeriksaanController::class, 'deletePemeriksaanObat'])
        ->name('pemeriksaanobat.delete');

    // change status
    Route::get('pendaftaranstatus/{id}', [PendaftaranController::class, 'changeStatus'])->name('pendaftaranstatus.update');

    Route::group(['prefix' => 'select2'], function () {
        Route::get('pendaftaran', [Pendaftarancontroller::class, 'selectRm'])->name('dashboard.select2.pendaftaran');
        Route::get('obat', [ObatController::class, 'select2'])->name('dashboard.select2.obat');
    });

    Route::group(['prefix' => 'export'], function () {
        Route::get('/export/{type}', [LaporanController::class, 'export'])
            ->name('laporan.export');
    });
});


require __DIR__ . '/auth.php';
