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
use App\Src\Service\OutsService;
use App\Support\Sys;
use Illuminate\Support\Facades\Redis;

class PushController extends BaseController
{
    /**
     * 消息发送、记录
     * @param PushForm $form
     * @param OutsService $service
     * @return \Illuminate\Http\JsonResponse
     */
    public function push(PushForm $form, OutsService $service)
    {
        $data = request()->all();
        // 表单验证
        $form->validate($data);
        // 记录数据库
        $data = $service->setOuts($form);
        // 消息发送到web
        Redis::lpush(Sys::REDIS_WEB_SERVER_KEY, json_encode($data, JSON_UNESCAPED_UNICODE));
        return api_response([]);
    }

    /**
     * 聊天发送
     * @return \Illuminate\Http\JsonResponse
     */
    public function chat()
    {
        $data = request()->all();
        dd($data);
        // 消息发送到web
//        Redis::lpush(Sys::REDIS_CHAT_WEB_SERVER_KEY, json_encode($data, JSON_UNESCAPED_UNICODE));
        return api_response([]);
    }
}