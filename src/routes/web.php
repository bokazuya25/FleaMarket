<?php

use App\Http\Controllers\MypageController;
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

Route::view('/purchase/:item_id', 'purchase')->middleware('auth', 'verified');

Route::view('/purchase/address', 'address');

Route::view('/item/comment', 'comment');

Route::view('/sell', 'sell')->middleware('auth', 'verified');
