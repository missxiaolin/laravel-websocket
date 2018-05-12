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
    public $type;

    public $team_id;

    public $content;

    public $image;

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
        $this->type = array_get($this->data, 'type');
        $this->team_id = array_get($this->data, 'team_id');
        $this->content = array_get($this->data, 'content');
        $this->image = array_get($this->data, 'image');
    }

}