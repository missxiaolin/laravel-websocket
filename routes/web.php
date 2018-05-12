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

// 登录
$router->any('home/login', 'HomeController@login')->name('home.login');

Route::group(['middleware' => 'auth.web'], function () {
    // 首页
    Route::any('home/index', 'HomeController@index')->name('home.index');
    // 详情页
    Route::any('home/detail', 'HomeController@detail')->name('home.detail');
});

// api
Route::group(['prefix' => 'api', 'namespace' => 'Api'], function () {
    // 登录
    Route::any('/user/login', 'UserController@login')->name('api.user.login');
    // push
    Route::any('/push/push', 'PushController@push')->name('api.push.push');
    // 聊天
    Route::any('/push/chat', 'PushController@chat')->name('api.push.chat');
});

// admin
Route::group(['prefix' => 'admin', 'namespace' => 'Admin'], function () {
    Route::any('/live/index', 'LiveController@index')->name('live.index');
    // 图片上传
    Route::any('/image/upload', 'ImageController@upload')->name('image.upload');
});