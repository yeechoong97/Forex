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

Route::get('/', function () {
    return view('welcome');
});


Route::get('home','MainController@getOANDA')->name("home");
Route::post('/home/api','MainController@getCandle');
Route::post('home/instrument','MainController@getCandleStick');

Auth::routes();
