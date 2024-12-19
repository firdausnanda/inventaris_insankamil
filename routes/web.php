<?php

use App\Http\Controllers\ActivityLogController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\ProdukController;
use App\Http\Controllers\Admin\StokOpnameController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Auth;
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
    return redirect()->route('login');
});

Auth::routes(['register' => false]);

Route::group(['middleware' => 'auth'], function () {

    // Superadmin
    Route::group(['middleware' => 'role:superadmin', 'as' => 'superadmin.'], function () {
        // Dashboard
        Route::group(['prefix' => 'dashboard', 'as' => 'dashboard.'], function () {
            Route::get('/', [DashboardController::class, 'index'])->name('index');
        });

        // Activity Log
        Route::group(['prefix' => 'activity-log', 'as' => 'activity-log.'], function () {
            Route::get('/', [ActivityLogController::class, 'index'])->name('index');
        });

        // Produk
        Route::group(['prefix' => 'produk', 'as' => 'produk.'], function () {
            Route::get('/', [ProdukController::class, 'index'])->name('index');
        });

        // Stok Opname
        Route::group(['prefix' => 'stok-opname', 'as' => 'stok-opname.'], function () {
            Route::get('/', [StokOpnameController::class, 'index'])->name('index');
        });

        // User
        Route::group(['prefix' => 'user', 'as' => 'user.'], function () {
            Route::get('/', [UserController::class, 'index'])->name('index');
            Route::post('/', [UserController::class, 'store'])->name('store');
            Route::put('/', [UserController::class, 'update'])->name('update');
            Route::delete('/', [UserController::class, 'delete'])->name('delete');
        });
    });

    // Admin
    Route::group(['middleware' => 'role:admin', 'as' => 'admin.'], function () {
        // Dashboard
        Route::group(['prefix' => 'dashboard', 'as' => 'dashboard.'], function () {
            Route::get('/', [DashboardController::class, 'index'])->name('index');
        });

        // Activity Log
        Route::group(['prefix' => 'activity-log', 'as' => 'activity-log.'], function () {
            Route::get('/', [ActivityLogController::class, 'index'])->name('index');
        });

        // Produk   
        Route::group(['prefix' => 'produk', 'as' => 'produk.'], function () {
            Route::get('/', [ProdukController::class, 'index'])->name('index');
        });

        // Stok Opname
        Route::group(['prefix' => 'stok-opname', 'as' => 'stok-opname.'], function () {
            Route::get('/', [StokOpnameController::class, 'index'])->name('index');
        });

        // User
        Route::group(['prefix' => 'user', 'as' => 'user.'], function () {
            Route::get('/', [UserController::class, 'index'])->name('index');
            Route::post('/', [UserController::class, 'store'])->name('store');
            Route::put('/', [UserController::class, 'update'])->name('update');
            Route::delete('/', [UserController::class, 'delete'])->name('delete');
        });
    });
});



// Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

