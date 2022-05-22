<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LoginController AS Home;
use App\Http\Controllers\Auth\LoginController;

//Master Data
use App\Http\Controllers\MasterData\MasterDataController;
use App\Http\Controllers\MasterData\UserController;
use App\Http\Controllers\MasterData\RoleController;
use App\Http\Controllers\MasterData\OutletController;
use App\Http\Controllers\MasterData\HargaController;
use App\Http\Controllers\MasterData\LayananController;

Route::get('/', [Home::class, 'index']);
Route::post('login-qr', [LoginController::class, 'loginQR'])->name('login-qr');

Auth::routes();

Route::middleware(['auth'])->group(function () {
    Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
    Route::prefix('master-data')->group(function () {

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

    });
});

