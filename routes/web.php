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


Route::group(['middleware' => 'wechat.oauth'], function () {
    Route::resource('user', 'UserController');
    Route::get('/', 'HomeController@index');
});
Route::group(['prefix' => 'shop'], function () {
    Route::get('list', 'IndexController@shopList');
    Route::get('details', 'IndexController@shopDetails');
});


Route::post('/tools/sendmsg', 'HomeController@sendMessage');

Route::any('wechat', 'WechatController@serve');

