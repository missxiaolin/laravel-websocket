<?php
/**
 * Created by PhpStorm.
 * User: mac
 * Date: 2018/5/12
 * Time: 下午9:44
 */
namespace App\Src\Service;

use App\Support\InstanceTrait;

class OutsService
{
    use InstanceTrait;

    /**
     * @param $form
     * @return array
     */
    public function setOuts($form)
    {
        $teams = [
            1 => [
                'name' => '马刺',
                'logo' => config('page.host') . '/images/team1.png',
            ],
            4 => [
                'name' => '火箭',
                'logo' => config('page.host') . '/images/team2.png',
            ],
        ];
        $result = [
            'type' => $form->type,
            'title' => array_get($teams, $form->team_id)['name'] ?? '',
            'logo' => array_get($teams, $form->team_id)['logo'] ?? '',
            'content' => $form->content,
            'image' => $form->image,
        ];
        return $result;
    }
}