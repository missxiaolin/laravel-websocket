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
    public function index()
    {
        $this->title = '首页';
        $this->file_css = 'css/home/index';
        $this->file_js = 'pages/home/index';
        return $this->view('home.index');
    }
}
