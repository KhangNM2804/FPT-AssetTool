<?php

use App\Http\Controllers\Admin\AssetController;
use App\Http\Controllers\Admin\AssetDetailController;
use App\Http\Controllers\Admin\CategoryAssetController;
use App\Http\Controllers\Admin\CategoryRoomController;
use App\Http\Controllers\Admin\GroupAssetController;
use App\Http\Controllers\Admin\HandoverController;
use App\Http\Controllers\Admin\RoomController;
use App\Http\Controllers\Admin\UserController;

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

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::group(['prefix' => 'staff', 'as' => 'staff.'], function () {
    Route::group(['prefix' => 'locate', 'as' => 'locate.'], function () {
        Route::resource('categoryrooms', CategoryRoomController::class);
        Route::resource('rooms', RoomController::class);
    });

    Route::group(['prefix' => 'asset', 'as' => 'asset.'], function () {
        Route::resource('group-assets', GroupAssetController::class);
        Route::resource('category-assets', CategoryAssetController::class);
        Route::resource('asset',AssetController::class);
        Route::resource('asset-detail',AssetDetailController::class);
        Route::resource('handover',HandoverController::class);
        Route::post('asset-detail/merge',[AssetDetailController::class,'merge'])->name('asset-detail.merge');
        Route::post('asset-detail/{detail}/split',[AssetDetailController::class,'split'])->name('asset-detail.split');
        Route::post('asset-detail/{detail}/buy',[AssetDetailController::class,'buy'])->name('asset-detail.buy');

    });
    Route::group(['prefix' => 'datatables', 'as' => 'datatables.'], function () {
        Route::get('categoryrooms', [CategoryRoomController::class, 'datatables'])->name('category_rooms');
        Route::get('rooms', [RoomController::class, 'getAllRoom'])->name('rooms');
        Route::get('group-assets', [GroupAssetController::class, 'datatables'])->name('group-assets');
        Route::get('category-assets', [CategoryAssetController::class, 'datatables'])->name('category-assets');
        Route::get('asset',[AssetController::class,'datatables'])->name('asset');
    });
    Route::group(['prefix' => 'search', 'as' => 'search.'], function () {
        Route::get('categoryrooms', [CategoryRoomController::class, 'search'])->name('category_rooms');
        Route::get('users', [UserController::class, 'search'])->name('users');
        Route::get('group-assets',[GroupAssetController::class,'search'])->name('group-assets');
        Route::get('category-assets',[CategoryAssetController::class,'search'])->name('category-assets');
     
    });
});
