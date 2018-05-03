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
        return $this->view('home.index');
    }

    // 登录
    public function login()
    {
        $this->title = '登录';
        return $this->view('home.login');
    }

    // 详情页
    public function detail()
    {
        $data = [];
        $this->title = '直播详情页';
        return $this->view('home.detail', $data);
    }
}
