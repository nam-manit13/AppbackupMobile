<?php

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

// Route::get('/', function () {
//     return view('welcome');
// });
Route::get('/', 'PagersController@index');
Route::get('login','PagersController@login');
Route::get('adduser','PagersController@adduser');
Route::get('showbintype','PagersController@showbintype');
Route::get('showbincycle','PagersController@showbincycle');
Route::get('showbintime','PagersController@showbintime');
Route::get('reportbin','PagersController@reportbin');
Route::get('settingbin','PagersController@settingbin');
Route::get('deleteuser','PagersController@deleteuser');
Route::get('addbin','PagersController@addbin');
Route::get('test','PagersController@test');
Route::get('firebase','FirebaseController@index');
