<?php
/**
 * Created by PhpStorm.
 * User: mac
 * Date: 2018/5/8
 * Time: 上午11:20
 */

namespace App\Src\From\Push;


use App\Src\From\Form;

class PushForm extends Form
{

    public function rules()
    {
        return [
            'type' => 'required',
            'team_id' => 'required',
            'content' => 'required',
        ];
    }

    public function messages()
    {
        return [
            'required' => ':attribute必填。',
        ];
    }

    public function attributes()
    {
        return [
            'type' => '类型',
            'team_id' => '球队',
            'content' => '内容',
        ];
    }

    public function validation()
    {
    }

}