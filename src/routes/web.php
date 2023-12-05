<?php

use App\Http\Controllers\MypageController;
use App\Http\Controllers\PurchaseController;
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

Route::middleware(['auth', 'verified'])->group(function () {
    Route::get('/mypage', [MypageController::class, 'index']);
    Route::get('/mypage/profile', [MypageController::class, 'profile']);
    Route::post('/mypage/profile/update', [MypageController::class, 'update']);
});

Route::view('/', 'index');

Route::view('/item', 'item');

Route::get('/purchase/address/{item_id}', [PurchaseController::class,'address'])->middleware('auth','verified');

Route::post('/purchase/address/update/{item_id}',[PurchaseController::class,'update_address'])->middleware('auth','verified');

Route::get('/purchase/{item_id}', [PurchaseController::class,'index'])->middleware('auth', 'verified');

Route::view('/purchase/payment/{item_id}',[PurchaseController::class,'payment']);

Route::view('/item/comment', 'comment');

Route::view('/sell', 'sell')->middleware('auth', 'verified');
