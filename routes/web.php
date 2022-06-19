<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\LoginController;

//Master Data
use App\Http\Controllers\MasterData\MasterDataController;
use App\Http\Controllers\MasterData\UserController;
use App\Http\Controllers\MasterData\RoleController;
use App\Http\Controllers\MasterData\OutletController;
use App\Http\Controllers\MasterData\HargaController;
use App\Http\Controllers\MasterData\LayananController;
use App\Http\Controllers\MasterData\MemberController;
use App\Http\Controllers\MasterData\ParfumeController;

//Transaksi
use App\Http\Controllers\Transaksi\KasirController;
use App\Http\Controllers\Transaksi\TopupController;
use App\Http\Controllers\Transaksi\ExpedisiJadwalJemputController;
use App\Http\Controllers\Transaksi\ExpedisiJemputController;
use App\Http\Controllers\Transaksi\ExpedisiJadwalAntarController;
use App\Http\Controllers\Transaksi\ExpedisiAntarController;
use App\Http\Controllers\Transaksi\QcController;
use App\Http\Controllers\Transaksi\CuciController;
use App\Http\Controllers\Transaksi\PengeringanController;
use App\Http\Controllers\Transaksi\SetrikaController;

//Member
use App\Http\Controllers\Member\PermintaanLaundryController;
use App\Http\Controllers\Member\HistoryLaundryController;

Route::get('/', function() {
    return redirect('/login');
});
Route::post('login-qr', [LoginController::class, 'loginQR'])->name('login-qr');
Auth::routes(['register' => false]);
Route::middleware(['auth'])->group(function () {

    Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
    Route::get('/infogram', [App\Http\Controllers\HomeController::class, 'infogram'])->name('infogram');
    Route::get('/laporan', [App\Http\Controllers\HomeController::class, 'laporan'])->name('laporan');
    Route::get('/like', [App\Http\Controllers\HomeController::class, 'like'])->name('like');
    Route::get('/dislike', [App\Http\Controllers\HomeController::class, 'dislike'])->name('dislike');

    Route::get('/home-user', [App\Http\Controllers\HomeController::class, 'indexuser'])->name('home-user');

    // Route::get('/infogram', function() {
    //     return redirect('/home');
    // })->name('infogram');

    Route::prefix('master-data')->middleware(['role_or_permission:Maintener|master-data'])->group(function () {

        Route::get('/', [MasterDataController::class, 'index'])->name('master-data');

        Route::prefix('roles')->group(function () {
            Route::get('/', [RoleController::class, 'index'])->name('roles');
            Route::post('/get-data', [RoleController::class, 'getData'])->name('roles.get-data');
            Route::get('/create', [RoleController::class, 'create'])->name('roles.create');
            Route::post('/store', [RoleController::class, 'store'])->name('roles.store');
            Route::get('/edit/{id}', [RoleController::class, 'edit'])->name('roles.edit');
            Route::put('/update', [RoleController::class, 'update'])->name('roles.update');
            Route::get('/destroy/{id}', [RoleController::class, 'destroy'])->name('roles.destroy');
        });

        Route::prefix('users')->group(function () {
            Route::get('/', [UserController::class, 'index'])->name('users');
            Route::post('/get-data', [UserController::class, 'getData'])->name('users.get-data');
            Route::get('/create', [UserController::class, 'create'])->name('users.create');
            Route::post('/store', [UserController::class, 'store'])->name('users.store');
            Route::get('/detail/{id}', [UserController::class, 'detail'])->name('users.detail');
            Route::get('/edit/{id}', [UserController::class, 'edit'])->name('users.edit');
            Route::put('/update', [UserController::class, 'update'])->name('users.update');
            Route::get('/destroy/{id}', [UserController::class, 'destroy'])->name('users.destroy');
        });

        Route::prefix('outlet')->group(function () {
            Route::get('/', [OutletController::class, 'index'])->name('outlet');
            Route::post('/get-data', [OutletController::class, 'getData'])->name('outlet.get-data');
            Route::get('/create', [OutletController::class, 'create'])->name('outlet.create');
            Route::post('/store', [OutletController::class, 'store'])->name('outlet.store');
            Route::get('/detail/{id}', [OutletController::class, 'detail'])->name('outlet.detail');
            Route::get('/edit/{id}', [OutletController::class, 'edit'])->name('outlet.edit');
            Route::put('/update', [OutletController::class, 'update'])->name('outlet.update');
            Route::get('/destroy/{id}', [OutletController::class, 'destroy'])->name('outlet.destroy');
        });

        Route::prefix('harga')->group(function () {
            Route::get('/', [HargaController::class, 'index'])->name('harga');
            Route::post('/get-data', [HargaController::class, 'getData'])->name('harga.get-data');
            Route::get('/create', [HargaController::class, 'create'])->name('harga.create');
            Route::post('/store', [HargaController::class, 'store'])->name('harga.store');
            Route::get('/detail/{id}', [HargaController::class, 'detail'])->name('harga.detail');
            Route::get('/edit/{id}', [HargaController::class, 'edit'])->name('harga.edit');
            Route::put('/update', [HargaController::class, 'update'])->name('harga.update');
            Route::get('/destroy/{id}', [HargaController::class, 'destroy'])->name('harga.destroy');
        });

        Route::prefix('layanan')->group(function () {
            Route::get('/', [LayananController::class, 'index'])->name('layanan');
            Route::post('/get-data', [LayananController::class, 'getData'])->name('layanan.get-data');
            Route::get('/create', [LayananController::class, 'create'])->name('layanan.create');
            Route::post('/store', [LayananController::class, 'store'])->name('layanan.store');
            Route::get('/detail/{id}', [LayananController::class, 'detail'])->name('layanan.detail');
            Route::get('/edit/{id}', [LayananController::class, 'edit'])->name('layanan.edit');
            Route::put('/update', [LayananController::class, 'update'])->name('layanan.update');
            Route::get('/destroy/{id}', [LayananController::class, 'destroy'])->name('layanan.destroy');
        });

        Route::prefix('member')->group(function () {
            Route::get('/', [MemberController::class, 'index'])->name('user-member');
            Route::post('/get-data', [MemberController::class, 'getData'])->name('user-member.get-data');
            Route::get('/create', [MemberController::class, 'create'])->name('user-member.create');
            Route::post('/store', [MemberController::class, 'store'])->name('user-member.store');
            Route::get('/detail/{id}', [MemberController::class, 'detail'])->name('user-member.detail');
            Route::get('/edit/{id}', [MemberController::class, 'edit'])->name('user-member.edit');
            Route::put('/update', [MemberController::class, 'update'])->name('user-member.update');
            Route::get('/destroy/{id}', [MemberController::class, 'destroy'])->name('user-member.destroy');
        });

        Route::prefix('parfume')->group(function () {
            Route::get('/', [ParfumeController::class, 'index'])->name('parfume');
            Route::post('/get-data', [ParfumeController::class, 'getData'])->name('parfume.get-data');
            Route::get('/create', [ParfumeController::class, 'create'])->name('parfume.create');
            Route::post('/store', [ParfumeController::class, 'store'])->name('parfume.store');
            Route::get('/detail/{id}', [ParfumeController::class, 'detail'])->name('parfume.detail');
            Route::get('/edit/{id}', [ParfumeController::class, 'edit'])->name('parfume.edit');
            Route::put('/update', [ParfumeController::class, 'update'])->name('parfume.update');
            Route::get('/destroy/{id}', [ParfumeController::class, 'destroy'])->name('parfume.destroy');
        });



    });

    Route::prefix('kasir')->group(function () {
        Route::get('/', [KasirController::class, 'index'])->name('kasir');
        Route::post('/get-layanan', [KasirController::class, 'getDataLayanan'])->name('kasir.get-data-layanan');
        Route::get('/print/{kode_transaksi}', [KasirController::class, 'print'])->name('kasir.print');
        Route::post('/store', [KasirController::class, 'store'])->name('kasir.store');
    });

    Route::prefix('permintaan-laundry')->group(function () {
        Route::get('/', [PermintaanLaundryController::class, 'index'])->name('permintaan-laundry');
        Route::post('/get-data', [PermintaanLaundryController::class, 'getData'])->name('permintaan-laundry.get-data');
        Route::get('/create', [PermintaanLaundryController::class, 'create'])->name('permintaan-laundry.create');
        Route::post('/store', [PermintaanLaundryController::class, 'store'])->name('permintaan-laundry.store');
        Route::get('/detail/{id}', [PermintaanLaundryController::class, 'detail'])->name('permintaan-laundry.detail');
        Route::get('/edit/{id}', [PermintaanLaundryController::class, 'edit'])->name('permintaan-laundry.edit');
        Route::put('/update', [PermintaanLaundryController::class, 'update'])->name('permintaan-laundry.update');
        Route::get('/destroy/{id}', [PermintaanLaundryController::class, 'destroy'])->name('permintaan-laundry.destroy');
        Route::post('/get-data-layanan', [PermintaanLaundryController::class, 'getDataLayanan'])->name('permintaan-laundry.get-data-layanan');
        Route::post('/get-data-parfume', [PermintaanLaundryController::class, 'getDataParfume'])->name('permintaan-laundry.get-data-parfume');
    });

    Route::prefix('top-up')->group(function () {
        Route::get('/', [TopupController::class, 'index'])->name('top-up');
        Route::post('/get-data', [TopupController::class, 'getData'])->name('top-up.get-data');
        Route::get('/create', [TopupController::class, 'create'])->name('top-up.create');
        Route::post('/store', [TopupController::class, 'store'])->name('top-up.store');
        Route::get('/detail/{id}', [TopupController::class, 'detail'])->name('top-up.detail');
        Route::get('/edit/{id}', [TopupController::class, 'edit'])->name('top-up.edit');
        Route::put('/update', [TopupController::class, 'update'])->name('top-up.update');
        Route::get('/destroy/{id}', [TopupController::class, 'destroy'])->name('top-up.destroy');
        Route::post('/get-data-member', [TopupController::class, 'getDataMember'])->name('top-up.get-data-member');
    });


    Route::prefix('expedisi-jadwal-jemput')->group(function () {
        Route::get('/', [ExpedisiJadwalJemputController::class, 'index'])->name('expedisi-jadwal-jemput');
        Route::post('/get-data', [ExpedisiJadwalJemputController::class, 'getData'])->name('expedisi-jadwal-jemput.get-data');
        Route::get('/create', [ExpedisiJadwalJemputController::class, 'create'])->name('expedisi-jadwal-jemput.create');
        Route::post('/store', [ExpedisiJadwalJemputController::class, 'store'])->name('expedisi-jadwal-jemput.store');
        Route::get('/detail/{id}', [ExpedisiJadwalJemputController::class, 'detail'])->name('expedisi-jadwal-jemput.detail');
        Route::get('/edit/{id}', [ExpedisiJadwalJemputController::class, 'edit'])->name('expedisi-jadwal-jemput.edit');
        Route::put('/update', [ExpedisiJadwalJemputController::class, 'update'])->name('expedisi-jadwal-jemput.update');
        Route::get('/destroy/{id}', [ExpedisiJadwalJemputController::class, 'destroy'])->name('expedisi-jadwal-jemput.destroy');
        Route::post('/get-data-user', [ExpedisiJadwalJemputController::class, 'getDataUser'])->name('expedisi-jadwal-jemput.get-data-user');
        Route::post('/get-data-info', [ExpedisiJadwalJemputController::class, 'getDataInfo'])->name('expedisi-jadwal-jemput.get-data-info');
    });

    Route::prefix('expedisi-jemput')->group(function () {
        Route::get('/', [ExpedisiJemputController::class, 'index'])->name('expedisi-jemput');
        Route::post('/get-data', [ExpedisiJemputController::class, 'getData'])->name('expedisi-jemput.get-data');
        Route::get('/create', [ExpedisiJemputController::class, 'create'])->name('expedisi-jemput.create');
        Route::post('/store', [ExpedisiJemputController::class, 'store'])->name('expedisi-jemput.store');
        Route::get('/detail/{id}', [ExpedisiJemputController::class, 'detail'])->name('expedisi-jemput.detail');
        Route::get('/edit/{id}', [ExpedisiJemputController::class, 'edit'])->name('expedisi-jemput.edit');
        Route::put('/update', [ExpedisiJemputController::class, 'update'])->name('expedisi-jemput.update');
        Route::get('/destroy/{id}', [ExpedisiJemputController::class, 'destroy'])->name('expedisi-jemput.destroy');
        Route::post('/get-data-permintaan', [ExpedisiJemputController::class, 'getDataPermintaan'])->name('expedisi-jemput.get-data-permintaan');
    });

    Route::prefix('expedisi-jadwal-antar')->group(function () {
        Route::get('/', [ExpedisiJadwalAntarController::class, 'index'])->name('expedisi-jadwal-antar');
        Route::post('/get-data', [ExpedisiJadwalAntarController::class, 'getData'])->name('expedisi-jadwal-antar.get-data');
        Route::get('/create', [ExpedisiJadwalAntarController::class, 'create'])->name('expedisi-jadwal-antar.create');
        Route::post('/store', [ExpedisiJadwalAntarController::class, 'store'])->name('expedisi-jadwal-antar.store');
        Route::get('/detail/{id}', [ExpedisiJadwalAntarController::class, 'detail'])->name('expedisi-jadwal-antar.detail');
        Route::get('/edit/{id}', [ExpedisiJadwalAntarController::class, 'edit'])->name('expedisi-jadwal-antar.edit');
        Route::put('/update', [ExpedisiJadwalAntarController::class, 'update'])->name('expedisi-jadwal-antar.update');
        Route::get('/destroy/{id}', [ExpedisiJadwalAntarController::class, 'destroy'])->name('expedisi-jadwal-antar.destroy');
        Route::post('/get-data-user', [ExpedisiJadwalAntarController::class, 'getDataUser'])->name('expedisi-jadwal-antar.get-data-user');
        Route::post('/get-data-info', [ExpedisiJadwalAntarController::class, 'getDataInfo'])->name('expedisi-jadwal-antar.get-data-info');
    });

    Route::prefix('expedisi-antar')->group(function () {
        Route::get('/', [ExpedisiAntarController::class, 'index'])->name('expedisi-antar');
        Route::post('/get-data', [ExpedisiAntarController::class, 'getData'])->name('expedisi-antar.get-data');
        Route::get('/create', [ExpedisiAntarController::class, 'create'])->name('expedisi-antar.create');
        Route::post('/store', [ExpedisiAntarController::class, 'store'])->name('expedisi-antar.store');
        Route::get('/detail/{id}', [ExpedisiAntarController::class, 'detail'])->name('expedisi-antar.detail');
        Route::get('/edit/{id}', [ExpedisiAntarController::class, 'edit'])->name('expedisi-antar.edit');
        Route::put('/update', [ExpedisiAntarController::class, 'update'])->name('expedisi-antar.update');
        Route::get('/destroy/{id}', [ExpedisiAntarController::class, 'destroy'])->name('expedisi-antar.destroy');
        Route::post('/get-data-user', [ExpedisiAntarController::class, 'getDataUser'])->name('expedisi-antar.get-data-user');
        Route::post('/get-data-info', [ExpedisiAntarController::class, 'getDataInfo'])->name('expedisi-antar.get-data-info');
    });

    Route::prefix('qc')->group(function () {
        Route::get('/', [QcController::class, 'index'])->name('qc');
        Route::post('/get-data', [QcController::class, 'getData'])->name('qc.get-data');
        Route::post('/store', [QcController::class, 'store'])->name('qc.store');
    });

    Route::prefix('cuci')->group(function () {
        Route::get('/', [CuciController::class, 'index'])->name('cuci');
        Route::post('/get-data', [CuciController::class, 'getData'])->name('cuci.get-data');
        Route::post('/get-request', [CuciController::class, 'getRequest'])->name('cuci.request');
        Route::post('/store', [CuciController::class, 'store'])->name('cuci.store');
    });

    Route::prefix('pengeringan')->group(function () {
        Route::get('/', [PengeringanController::class, 'index'])->name('pengeringan');
        Route::post('/get-data', [PengeringanController::class, 'getData'])->name('pengeringan.get-data');
        Route::post('/get-request', [PengeringanController::class, 'getRequest'])->name('pengeringan.request');
        Route::post('/store', [PengeringanController::class, 'store'])->name('pengeringan.store');
    });

    Route::prefix('setrika')->group(function () {
        Route::get('/', [SetrikaController::class, 'index'])->name('setrika');
        Route::post('/get-data', [SetrikaController::class, 'getData'])->name('setrika.get-data');
        Route::post('/get-request', [SetrikaController::class, 'getRequest'])->name('setrika.request');
        Route::post('/store', [SetrikaController::class, 'store'])->name('setrika.store');
    });

    Route::prefix('expedisi-jadwal-antar')->group(function () {
        Route::get('/', [ExpedisiJadwalAntarController::class, 'index'])->name('expedisi-jadwal-antar');
        Route::post('/get-data', [ExpedisiJadwalAntarController::class, 'getData'])->name('expedisi-jadwal-antar.get-data');
        Route::get('/create', [ExpedisiJadwalAntarController::class, 'create'])->name('expedisi-jadwal-antar.create');
        Route::post('/store', [ExpedisiJadwalAntarController::class, 'store'])->name('expedisi-jadwal-antar.store');
        Route::get('/detail/{id}', [ExpedisiJadwalAntarController::class, 'detail'])->name('expedisi-jadwal-antar.detail');
        Route::get('/edit/{id}', [ExpedisiJadwalAntarController::class, 'edit'])->name('expedisi-jadwal-antar.edit');
        Route::put('/update', [ExpedisiJadwalAntarController::class, 'update'])->name('expedisi-jadwal-antar.update');
        Route::get('/destroy/{id}', [ExpedisiJadwalAntarController::class, 'destroy'])->name('expedisi-jadwal-antar.destroy');
        Route::post('/get-data-user', [ExpedisiJadwalAntarController::class, 'getDataUser'])->name('expedisi-jadwal-antar.get-data-user');
    });

    Route::prefix('history-laundry')->group(function () {
        Route::get('/', [HistoryLaundryController::class, 'index'])->name('history-laundry');
        Route::post('/get-data', [HistoryLaundryController::class, 'getData'])->name('history-laundry.get-data');
        Route::get('/create', [HistoryLaundryController::class, 'create'])->name('history-laundry.create');
        Route::post('/store', [HistoryLaundryController::class, 'store'])->name('history-laundry.store');
        Route::get('/detail/{id}', [HistoryLaundryController::class, 'detail'])->name('history-laundry.detail');
        Route::get('/edit/{id}', [HistoryLaundryController::class, 'edit'])->name('history-laundry.edit');
        Route::put('/update', [HistoryLaundryController::class, 'update'])->name('history-laundry.update');
        Route::get('/destroy/{id}', [HistoryLaundryController::class, 'destroy'])->name('history-laundry.destroy');
        Route::post('/get-data-layanan', [HistoryLaundryController::class, 'getDataLayanan'])->name('history-laundry.get-data-layanan');
        Route::post('/get-data-parfume', [HistoryLaundryController::class, 'getDataParfume'])->name('history-laundry.get-data-parfume');
        Route::get('/like/{id}', [HistoryLaundryController::class, 'like'])->name('history-laundry.like');
        Route::get('/dislike/{id}', [HistoryLaundryController::class, 'dislike'])->name('history-laundry.dislike');
    });

});

