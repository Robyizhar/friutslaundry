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

//Transaksi
use App\Http\Controllers\Transaksi\KasirController;
use App\Http\Controllers\Transaksi\TopupController;

//Member
use App\Http\Controllers\Member\PermintaanLaundryController;

Route::get('/', function() {
    return redirect('/login');
});
Route::post('login-qr', [LoginController::class, 'loginQR'])->name('login-qr');
Auth::routes(['register' => false]);
Route::middleware(['auth'])->group(function () {

    Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
    Route::get('/infogram', [App\Http\Controllers\HomeController::class, 'infogram'])->name('infogram');

    Route::get('/home-user', [App\Http\Controllers\HomeController::class, 'indexuser'])->name('home-user');

    Route::get('/infogram', function() {
        return redirect('/home');
    })->name('infogram');

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



    });

    Route::prefix('kasir')->group(function () {
        Route::get('/', [KasirController::class, 'index'])->name('kasir');
        // Route::post('/get-data', [KasirController::class, 'getData'])->name('kasir.get-data');
        // Route::get('/create', [KasirController::class, 'create'])->name('kasir.create');
        Route::post('/store', [KasirController::class, 'store'])->name('kasir.store');
        // Route::get('/edit/{id}', [KasirController::class, 'edit'])->name('kasir.edit');
        // Route::put('/update', [KasirController::class, 'update'])->name('kasir.update');
        // Route::get('/destroy/{id}', [KasirController::class, 'destroy'])->name('kasir.destroy');
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

});

