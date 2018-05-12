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
        // 表单验证
        $form->validate($data);
        // 记录数据库
        $teams = [
            1 => [
                'name' => '马刺',
                'logo' => '/images/team1.png',
            ],
            4 => [
                'name' => '火箭',
                'logo' => '/images/team2.png',
            ],
        ];
        $data = [
            'type' => $form->type,
            'title' => array_get($teams, $form->team_id)['name'] ?? '',
            'logo' => array_get($teams, $form->team_id)['logo'] ?? '',
            'content' => $form->content,
            'image' => $form->image,
        ];

        // 消息发送到web
        Redis::lpush(Sys::REDIS_WEB_SERVER_KEY, json_encode($data, JSON_UNESCAPED_UNICODE));
        return api_response([]);
    }
}