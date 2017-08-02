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


use Illuminate\Support\Facades\Route;

//web
Route::group(['middleware' => 'wechat.oauth'], function () {
    Route::resource('user', 'UserController');
    Route::get('/', 'HomeController@index');
    Route::group(['prefix' => 'shop'], function () {
        Route::get('{id}', 'IndexController@shopDetails');
    });
    Route::group(['prefix' => 'card'], function () {
        Route::get('{id}', 'IndexController@cardDetails');
        Route::get('show', 'IndexController@cardShow');
    });
    Route::group(['prefix' => 'borrow'], function () {
        Route::get('/', 'IndexController@borrowShow');
    });
});

//ajax
Route::group(['prefix' => 'shop'], function () {
    Route::get('list', 'IndexController@shopList');
});
Route::group(['prefix' => 'tags'], function () {
    Route::get('/', 'IndexController@tagsList');
});
Route::post('/tools/sendmsg', 'HomeController@sendMessage');
Route::any('wechat', 'WechatController@serve');

