<?php
/**
 * Created by PhpStorm.
 * User: mac
 * Date: 2018/5/7
 * Time: 下午1:17
 */

namespace App\Http\Controllers\Web\Admin;


use App\Http\Controllers\Web\BaseController;

class LiveController extends BaseController
{
    public function index()
    {
        return $this->view('live.index');
    }
}