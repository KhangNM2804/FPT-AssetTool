<?php

use App\Http\Controllers\Admin\AssetBorrowedController;
use App\Http\Controllers\Admin\AssetController;
use App\Http\Controllers\Admin\AssetDetailController;
use App\Http\Controllers\Admin\BorrowController;
use App\Http\Controllers\Admin\CategoryAssetController;
use App\Http\Controllers\Admin\CategoryRoomController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\GroupAssetController;
use App\Http\Controllers\Admin\HandoverController;
use App\Http\Controllers\Admin\InvoiceController;
use App\Http\Controllers\Admin\PageController;
use App\Http\Controllers\Admin\RoomController;
use App\Http\Controllers\Admin\SemesterController;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\Auth\MicrosoftLoginController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\MailController;

use Illuminate\Support\Facades\Route;
use SebastianBergmann\CodeCoverage\Report\Html\Dashboard;

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

Route::get('/', [HomeController::class, 'index']);

Route::get('/home', [HomeController::class, 'index']);
Route::get('/send-reminder', [MailController::class, 'sendReminderEmail']);
Auth::routes();

Route::get('/login/microsoft', [MicrosoftLoginController::class, 'redirectToAzure'])->name('loginMicrosoft');
Route::get('/login/microsoft/callback', [MicrosoftLoginController::class, 'handleAzureCallback']);
Route::get('/storage/pdf/{filename}', function ($filename) {
    // Check if the user is authenticated and has access to the file
    if (auth()->check()) {
        // Get the file's storage path
        $path = storage_path('app/private/pdf/' . $filename);

        // Return the file response
        return response()->file($path);
    } else {
        // If the user doesn't have access, return a 403 Forbidden response
        return abort(403, 'Access denied.');
    }
});

Route::group(['prefix' => 'staff', 'as' => 'staff.', 'middleware' => ['auth', 'role:admin|manager|staff']], function () {
    Route::get('count', [PageController::class, 'count'])->name('count');

    Route::group(['prefix' => 'locate', 'as' => 'locate.'], function () {
        Route::resource('categoryrooms', CategoryRoomController::class);
        Route::resource('rooms', RoomController::class);
    });
    Route::group(['prefix' => 'asset', 'as' => 'asset.'], function () {
        Route::resource('invoices', InvoiceController::class);
        Route::resource('group-assets', GroupAssetController::class);
        Route::resource('category-assets', CategoryAssetController::class);
        Route::resource('asset', AssetController::class);
        Route::resource('borrowed-asset', AssetBorrowedController::class);
        Route::resource('asset-detail', AssetDetailController::class);
        Route::resource('handover', HandoverController::class);
        Route::post('handover/save', [HandoverController::class, 'save'])->name('handover.save');
        Route::post('asset-detail/merge', [AssetDetailController::class, 'merge'])->name('asset-detail.merge');
        Route::post('asset-detail/{detail}/split', [AssetDetailController::class, 'split'])->name('asset-detail.split');
        Route::post('asset-detail/{detail}/sell', [AssetDetailController::class, 'sell'])->name('asset-detail.sell');
        Route::get('importAsset', [AssetController::class, 'importIndex'])->name('asset.import');
        Route::post('importAsset', [AssetController::class, 'import'])->name('asset.importFile');
    });
    Route::group(['prefix' => 'borrow', 'as' => 'borrow.'], function () {
        Route::resource('borrows', BorrowController::class)->except(['store']);
        Route::put('borrows-accept/{id}', [BorrowController::class, 'accept'])->name('accept');
        Route::put('borrows-return/{id}', [BorrowController::class, 'return'])->name('return');
        Route::put('borrows-cancel/{id}', [BorrowController::class, 'cancel'])->name('cancel');
    });
    Route::group(['prefix' => 'semesters', 'as' => 'semester.'], function () {
        Route::resource('semesters', SemesterController::class);
    });
    Route::group(['prefix' => 'users', 'as' => 'users.'], function () {
        Route::resource('users', UserController::class);
    });
    Route::group(['prefix' => 'dashboard', 'as' => 'dashboard.'], function () {
        Route::get('dashboardExpenseRoom', [DashboardController::class, 'index'])->name('indexExpenseRoom');
        Route::get('dashboardSellAsset', [DashboardController::class, 'dashboardSell'])->name('indexSellAsset');
    });

    Route::group(['prefix' => 'datatables', 'as' => 'datatables.'], function () {
        Route::get('categoryrooms', [CategoryRoomController::class, 'datatables'])->name('category_rooms');
        Route::get('rooms', [RoomController::class, 'getAllRoom'])->name('rooms');
        Route::get('group-assets', [GroupAssetController::class, 'datatables'])->name('group-assets');
        Route::get('category-assets', [CategoryAssetController::class, 'datatables'])->name('category-assets');
        Route::get('asset', [AssetController::class, 'datatables'])->name('asset');
        Route::get('asset_selled', [DashboardController::class, 'datatables_selled'])->name('asset_selled');
        Route::get('borrowed-asset', [AssetBorrowedController::class, 'datatables'])->name('borrowed-asset');
        Route::get('borrows', [BorrowController::class, 'datatables'])->name('borrows');
        Route::get('semester', [SemesterController::class, 'datatables'])->name('semester');
        Route::get('users', [UserController::class, 'datatables'])->name('users');
        Route::get('invoices', [InvoiceController::class, 'datatables'])->name('invoices');
    });
    Route::group(['prefix' => 'search', 'as' => 'search.'], function () {
        Route::get('categoryrooms', [CategoryRoomController::class, 'search'])->name('category_rooms');
        Route::get('users', [UserController::class, 'search'])->name('users');
        Route::get('group-assets', [GroupAssetController::class, 'search'])->name('group-assets');
        Route::get('category-assets', [CategoryAssetController::class, 'search'])->name('category-assets');
        Route::get('rooms', [RoomController::class, 'search'])->name('rooms');
        Route::get('semester', [SemesterController::class, 'search'])->name('semester');
    });
    Route::group(['prefix' => 'export', 'as' => 'export.'], function () {
        Route::get('handover', [HandoverController::class, 'export'])->name('handover');
        Route::get('form', [AssetController::class, 'exportForm'])->name('form');
        Route::get('asset', [AssetController::class, 'export'])->name('asset');
    });
});
Route::group(['prefix' => 'client', 'as' => 'client.', 'middleware' => ['auth', 'role:admin|staff|teacher|manager']], function () {
    Route::group(['prefix' => 'borrow', 'as' => 'borrow.'], function () {
        Route::resource('borrows', BorrowController::class)->only(['store']);
        Route::get('borrows-client', [BorrowController::class, 'indexClient'])->name('borrows-client');
        Route::get('borrows-client-index', [BorrowController::class, 'borrowClient'])->name('borrows-client-index');
        Route::delete('borrows-client-cancel/{id}', [BorrowController::class, 'cancelClient'])->name('borrows-client-cancel');
    });
});
