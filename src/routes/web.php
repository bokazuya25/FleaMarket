<?php

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

Route::view('/mypage', 'mypage')->middleware('auth','verified');

Route::view('/mypage/profile', 'profile');

Route::view('/', 'index');

Route::view('/item', 'item');

Route::view('/purchase', 'purchase')->middleware('auth','verified');

Route::view('/purchase/address', 'address');

Route::view('/item/comment', 'comment');

Route::view('/sell', 'sell')->middleware('auth','verified');
