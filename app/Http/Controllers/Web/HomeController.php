<?php

namespace App\Http\Controllers\Web;
/**
 * Created by PhpStorm.
 * User: mac
 * Date: 2018/5/1
 * Time: 上午10:42
 */

class HomeController extends BaseController
{
    // 首页
    public function index()
    {
        $this->title = '首页';
        $this->file_css = 'css/home/index';
        $this->file_js = 'pages/home/index';
        return $this->view('home.index');
    }

    // 登录
    public function login()
    {
        $this->title = '登录';
        $this->file_css = 'css/home/login';
        $this->file_js = 'pages/home/login';
        return $this->view('home.login');
    }

    // 详情页
    public function detail()
    {
        $data = [];
        $this->title = '直播详情页';
        $this->file_css = 'css/home/detail';
        $this->file_js = 'pages/home/detail';
        return $this->view('home.detail', $data);
    }
}
