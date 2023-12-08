<?php

use App\Http\Controllers\IndexController;
use App\Http\Controllers\ItemController;
use App\Http\Controllers\MypageController;
use App\Http\Controllers\PurchaseController;
use App\Http\Controllers\SellController;
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

// 認証が必要なルート
Route::middleware(['auth', 'verified'])->group(function () {
    // マイページ関連
    Route::prefix('mypage')->group(function() {
        Route::get('/', [MypageController::class, 'index']);
        Route::get('/profile', [MypageController::class, 'profile']);
        Route::post('/profile/update', [MypageController::class, 'update']);
    });

    // 購入関連
    Route::prefix('purchase')->group(function() {
        Route::get('/address/{item_id}', [PurchaseController::class, 'address']);
        Route::post('/address/update/{item_id}', [PurchaseController::class, 'updateAddress']);
        Route::view('/payment/{item_id}', [PurchaseController::class, 'payment']);
        Route::get('/{item_id}', [PurchaseController::class, 'index']);
    });

    // 商品関連
    Route::prefix('item')->group(function() {
        Route::get('/comment/{item_id}', [ItemController::class, 'comment']);
        Route::post('/comment/store/{item_id}', [ItemController::class, 'store']);
        Route::post('/like/{item_id}', [ItemController::class, 'like']);
        Route::delete('/unlike/{item_id}', [ItemController::class, 'unlike']);
    });

    // 出品関連
    Route::get('/sell', [SellController::class, 'index']);
    Route::post('/sell', [SellController::class, 'create']);
});

// 認証が不要なルート
Route::get('/', [IndexController::class, 'index']);
Route::get('/item/{item_id}', [ItemController::class,'index']);;


