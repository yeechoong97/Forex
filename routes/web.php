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

// Route::get('index','MainController@getOANDA')->name("index");
// Route::post('/index/api','MainController@getCandle');
// Route::post('index/instrument','MainController@getCandleStick');

Route::get('index','MainController@index')->name("index");
Route::post('index/store','MainController@create');
Route::put('index/close','MainController@close');

Route::post('index/data','MainController@getCandle');
Route::post('index/chart','MainController@changeSeries');


//Order History
Route::get('order','OrderController@show')->name("order-show");
Route::get('order/fetch','OrderController@fetch');

//Funds Management
Route::get('fund','FundController@index')->name("fund-index");
Route::put('fund/update','FundController@update')->name("fund-update");
Route::get('fund/withdraw','FundController@withdraw_index')->name("fund-withdraw");
Route::put('fund/withdraw','FundController@withdraw_update')->name("withdraw-update");
Route::get('fund/deposit','FundController@deposit_index')->name("fund-deposit");
Route::put('fund/deposit','FundController@deposit_update')->name("deposit-update");



Route::get('learning/introduction','ElearningController@intro')->name("learning-introduction");
Route::get('learning/player','ElearningController@player')->name("learning-player");
Route::get('learning/benefits','ElearningController@benefit')->name("learning-benefit");
Route::get('learning/stock','ElearningController@forexnstock')->name("learning-stock");
Route::get('learning/currency','ElearningController@currency')->name("learning-currency");
Route::get('learning/leverage','ElearningController@leverage')->name("learning-leverage");

Route::get('learning/fundamental','ElearningController@fundamental')->name("learning-fundamental");
Route::get('learning/watch','ElearningController@watch')->name("learning-watch");

Route::get('learning/technical','ElearningController@technical')->name("learning-technical");

Auth::routes();

