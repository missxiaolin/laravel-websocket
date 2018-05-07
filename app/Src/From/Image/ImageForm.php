<?php
/**
 * Created by PhpStorm.
 * User: mac
 * Date: 2018/5/7
 * Time: 下午7:26
 */

namespace App\Src\From\Image;


use App\Src\From\Form;

class ImageForm extends Form
{
    public $file;

    public function rules()
    {
        return [
            'file' => 'required',
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
            'file' => '图片',
        ];
    }

    public function validation()
    {
        $this->file = array_get($this->data, 'file');
    }
}