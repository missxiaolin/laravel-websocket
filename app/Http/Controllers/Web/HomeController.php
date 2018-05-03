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
        return $this->view('home.index');
    }

    // 登录
    public function login()
    {
        return $this->view('home.login');
    }

    // 详情页
    public function detail()
    {
        $data = [];
        return $this->view('home.detail', $data);
    }
}
