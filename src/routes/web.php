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

Route::view('/', 'index');

Route::view('/detail', 'detail');

Route::view('/purchase', 'purchase')->middleware('auth','verified');

