<?php
/**
 * Created by PhpStorm.
 * User: mac
 * Date: 2018/5/8
 * Time: 上午10:02
 */

namespace App\Http\Controllers\Web\Api;

use App\Http\Controllers\Web\BaseController;
use App\Src\From\Push\PushForm;
use App\Support\Sys;
use Illuminate\Support\Facades\Redis;

class PushController extends BaseController
{
    /**
     * 消息发送、记录
     * @param PushForm $form
     * @return \Illuminate\Http\JsonResponse
     */
    public function push(PushForm $form)
    {
        $data = request()->all();
        $form->validate($data);
        // 记录数据库

        // 消息发送到web
//        Redis::lpush(Sys::REDIS_WEB_SERVER_KEY, rand(0, 10000) . '');
        return api_response([]);
    }
}