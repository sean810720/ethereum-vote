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

/*
|--------------------------------------------------------------------------
| 參考範例
|--------------------------------------------------------------------------
|
 */
Route::get('account_balance', 'EthExampleController@account_balance');
Route::get('send_money', 'EthExampleController@send_money');
Route::get('send_contract', 'EthExampleController@send_contract');
Route::get('call_contract', 'EthExampleController@call_contract');

/*
|--------------------------------------------------------------------------
| 功能區
|--------------------------------------------------------------------------
|
 */

// 首頁
Route::get('/', 'VoteController@index');

// 取得項目列表
Route::get('items', 'VoteController@items');

// 投票
Route::get('vote/{item_key}', 'VoteController@vote');
