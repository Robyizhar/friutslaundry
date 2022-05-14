<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LoginController AS Home;
use App\Http\Controllers\Auth\LoginController;

//Master Data
use App\Http\Controllers\MasterData\MasterDataController;
use App\Http\Controllers\MasterData\UserController;
use App\Http\Controllers\MasterData\RoleController;

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

    });
});

