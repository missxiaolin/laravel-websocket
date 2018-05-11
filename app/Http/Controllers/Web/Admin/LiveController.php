<?php
/**
 * Created by PhpStorm.
 * User: mac
 * Date: 2018/5/7
 * Time: 下午1:17
 */

namespace App\Http\Controllers\Web\Admin;


use App\Http\Controllers\Web\BaseController;
use Illuminate\Support\Facades\Redis;

class LiveController extends BaseController
{
    public function index()
    {
        // 消息测试
        Redis::lpush('xxxxxx',rand(0,10000).'');
        return $this->view('live.index');
    }
}