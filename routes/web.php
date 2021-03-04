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

Route::get('/','MainController@index')->middleware('auth');

Route::get('index','MainController@index')->name("index");
Route::post('index/store','MainController@create');
Route::put('index/close','MainController@close');
Route::post('index/tutorial','MainController@setTutorial');

Route::post('index/data','MainController@getCandle');
Route::post('index/chart','MainController@changeSeries');
Route::get('chat','MainController@chat_index');
Route::post('index/rate','MainController@getCurrencyRate');

//Order History
Route::get('order/summary','OrderController@index')->name('order-summary');
Route::post('order/summary','OrderController@changeMonth')->name('order-change-month');
Route::get('order/history','OrderController@showHistory')->name("order-show-history");
Route::get('order/fetch','OrderController@fetch');

//Funds Management
Route::get('fund','FundController@index')->name("fund-index");
Route::put('fund/update','FundController@update')->name("fund-update");
Route::get('fund/withdraw','FundController@withdraw_index')->name("fund-withdraw");
Route::put('fund/withdraw','FundController@withdraw_update')->name("withdraw-update");
Route::get('fund/deposit','FundController@deposit_index')->name("fund-deposit");
Route::put('fund/deposit','FundController@deposit_update')->name("deposit-update");

//User Profile
Route::get('profile/index','ProfileController@index')->name("profile-index");
Route::post('profile/avatar','ProfileController@changeAvatar')->name("profile-avatar");
Route::put('profile/profile/update','ProfileController@updateProfile')->name("profile-update");
Route::put('profile/password/update','ProfileController@updatePassword')->name('profile-password-update');


//Forum
Route::get('forum/{tag}','ForumController@index')->name("forum-index");
Route::post('forum/create','ForumController@store')->name("forum-store");
Route::get('forum/{tag}/{id}','ForumController@show')->name("forum-show");
Route::put('forum/update','ForumController@update')->name("forum-update");
Route::get('forum/{tag}/{id}/destroy','ForumController@destroy')->name("forum-destroy");

Route::post('forum/{id}','ForumController@store_comment')->name("comment-store");
Route::put('comment/update','ForumController@update_comment')->name('comment-update');
Route::get('forum/comment/destroy/{id}/{tag}','ForumController@destroy_comment')->name('comment-destroy');
Route::patch('forum/fetch','ForumController@fetchForums');

//E-learning
//Forex Introduction
Route::get('learning/intro/introduction','ElearningController@intro')->name("learning-intro");
Route::get('learning/intro/trader','ElearningController@trader')->name("learning-trader");
Route::get('learning/intro/benefit','ElearningController@benefit')->name("learning-benefit");
Route::get('learning/intro/stock','ElearningController@stock')->name("learning-stock");

//Forex Knowledge
Route::get('learning/knowledge/currency','ElearningController@currency')->name("learning-currency");
Route::get('learning/knowledge/leverage','ElearningController@leverage')->name("learning-leverage");
Route::get('learning/knowledge/quote','ElearningController@quote')->name("learning-quote");
Route::get('learning/knowledge/pips','ElearningController@pips')->name("learning-pips");
Route::get('learning/knowledge/session','ElearningController@session')->name('learning-session');
Route::get('learning/knowledge/trade','ElearningController@trade')->name('learning-trade');
Route::get('learning/knowledge/spread','ElearningController@spread')->name('learning-spread');
Route::get('learning/knowledge/liquidity','ElearningController@liquidity')->name('learning-liquidity');
Route::get('learning/knowledge/mistake','ElearningController@mistake')->name('learning-mistake');
Route::get('learning/knowledge/chart','ElearningController@chart')->name('learning-chart');

//Forex Order
Route::get('learning/order/long-short','ElearningController@long_short')->name('learning-long-short');
Route::get('learning/order/bullish-bearish','ElearningController@bullish_bearish')->name('learning-bullish-bearish');
Route::get('learning/order/types','ElearningController@types')->name('learning-types');

//Forex Candlestick
Route::get('learning/candlestick/intro','ElearningController@candlestick')->name('learning-candlestick');
Route::get('learning/candlestick/doji','ElearningController@doji')->name('learning-doji');
Route::get('learning/candlestick/hammer','ElearningController@hammer')->name('learning-hammer');
Route::get('learning/candlestick/spinning-top','ElearningController@spinning_top')->name('learning-spinning-top');
Route::get('learning/candlestick/morning-star','ElearningController@morning_star')->name('learning-morning-star');
Route::get('learning/candlestick/evening-star','ElearningController@evening_star')->name('learning-evening-star');
Route::get('learning/candlestick/bullish-engulfing','ElearningController@bullish_engulfing')->name('learning-bullish-engulfing');
Route::get('learning/candlestick/bearish-engulfing','ElearningController@bearish_engulfing')->name('learning-bearish-engulfing');
Route::get('learning/candlestick/three-white-soldiers','ElearningController@three_white_soldiers')->name('learning-three-white-soldiers');
Route::get('learning/candlestick/three-black-crows','ElearningController@three_black_crows')->name('learning-three-black-crows');

//Chart Pattern
Route::get('learning/chart/intro','ElearningController@chart_intro')->name('learning-chart-intro');
Route::get('learning/chart/head-and-shoulders','ElearningController@head_and_shoulders')->name('learning-head-and-shoulders');
Route::get('learning/chart/cup-and-handle','ElearningController@cup_and_handle')->name('learning-cup-and-handle');
Route::get('learning/chart/double-top-bottom','ElearningController@double_top_bottom')->name('learning-double-top-bottom');
Route::get('learning/chart/triangle','ElearningController@triangle')->name('learning-triangle');
Route::get('learning/chart/flags-pennants','ElearningController@flags_pennants')->name('learning-flags-pennants');
Route::get('learning/chart/wedge','ElearningController@wedge')->name('learning-wedge');
Route::get('learning/chart/triple-top-bottom','ElearningController@triple_top_bottom')->name('learning-triple-top-bottom');
Route::get('learning/chart/round-bottom','ElearningController@round_bottom')->name('learning-round-bottom');

//Forex Fundamental Analysis
Route::get('learning/fundamental','ElearningController@fundamental')->name("learning-fundamental");

//Forex Technical Analysis
Route::get('learning/technical/intro','ElearningController@technical_intro')->name("learning-technical-intro");
Route::get('learning/technical/support-resistance','ElearningController@support_resistance')->name('learning-support-resistance');
Route::get('learning/technical/gaps','ElearningController@gaps')->name('learning-gaps');
Route::get('learning/technical/slippage','ElearningController@slippage')->name('learning-slippage');
Route::get('learning/technical/breakout','ElearningController@breakout')->name('learning-breakout');
Route::get('learning/technical/volume','ElearningController@volume')->name('learning-volume');
Route::get('learning/technical/trend','ElearningController@trend')->name('learning-trend');

//Forex Technical Indicator
Route::get('learning/indicator/intro','ElearningController@indicator_intro')->name('learning-indicator-intro');
Route::get('learning/indicator/macd','ElearningController@macd')->name('learning-macd');
Route::get('learning/indicator/ma','ElearningController@ma')->name('learning-ma');
Route::get('learning/indicator/rsi','ElearningController@rsi')->name('learning-rsi');
Route::get('learning/indicator/stochastic','ElearningController@stochastic')->name('learning-stochastic');
Route::get('learning/indicator/cci','ElearningController@cci')->name('learning-cci');
Route::get('learning/indicator/roc','ElearningController@roc')->name('learning-roc');
Route::get('learning/indicator/atr','ElearningController@atr')->name('learning-atr');
Route::get('learning/indicator/momentum','ElearningController@momentum')->name('learning-momentum');
Route::get('learning/indicator/dmi','ElearningController@dmi')->name('learning-dmi');
Route::get('learning/indicator/bollinger','ElearningController@bollinger')->name('learning-bollinger');
Route::get('learning/indicator/william','ElearningController@william')->name('learning-william');
Route::get('learning/indicator/psar','ElearningController@psar')->name('learning-psar');
Route::get('learning/indicator/adl','ElearningController@adl')->name('learning-adl');
Route::get('learning/indicator/obv','ElearningController@obv')->name('learning-obv');
Route::get('learning/indicator/mfi','ElearningController@mfi')->name('learning-mfi');
Route::get('learning/indicator/aroon','ElearningController@aroon')->name('learning-aroon');

Route::post('learning/search','ElearningController@search')->name('learning-search');

Auth::routes();

