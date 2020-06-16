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

Route::get('/', function () {
    return view('welcome');
});

//
Route::get("/mimin", "adminController@index");

//
Route::get("/mimin/tambal+ban", "tambalBanController@index");

//
Route::get("/mimin/komentar", "komentarController@index");

Route::get("/mimin/rating", "ratingController@index");

//
Route::get("/mimin/member", "memberController@index");

//x
Route::get("/mimin/pesan", "pesanController@index");

Route::get("/login", "authController@login");

Route::get("/register", "authController@register");

Route::get('/firebase','authController@index');

Route::get('/getdata','authController@getData');

Route::post('/create','authController@insert');

