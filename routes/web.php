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

// 首页
$router->any('home/index', 'HomeController@index')->name('home.index');
// 登录
$router->any('home/login', 'HomeController@login')->name('home.login');
// 详情页
$router->any('home/detail', 'HomeController@detail')->name('home.detail');

// api
Route::group(['prefix' => 'api', 'namespace' => 'Api'], function () {
    Route::any('/user/login', 'UserController@login')->name('api.user.login');
});