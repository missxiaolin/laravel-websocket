<?php
/**
 * Created by PhpStorm.
 * User: mac
 * Date: 2018/5/6
 * Time: 下午1:08
 */

namespace App\Src\From\User;


use App\Src\From\Form;
use App\Src\Repository\UserRepository;

class LoginFrom extends Form
{
    /**
     * @var string
     */
    public $phone;

    /**
     * @var string
     */
    public $password;

    /**
     * User
     * @var object
     */
    public $model;

    public function rules()
    {
        return [
            'phone' => 'required|string',
            'password' => 'required|string',
        ];
    }

    public function messages()
    {
        return [
            'required' => ':attribute必填。',
            'date_format' => ':attribute格式错误',
            'integer' => ':attribute整型',
            'string' => ':attribute字符串',
        ];
    }

    public function attributes()
    {
        return [
            'phone' => '手机号码',
            'password' => '密码',
        ];
    }

    public function validation()
    {
        $this->phone = array_get($this->data, 'phone');
        $this->password = array_get($this->data, 'password');
        $this->validateUser();
    }

    public function validateUser()
    {
        $user_repository = app(UserRepository::class);
        $model = $user_repository->getUser($this->phone);
        if (!$model) {
            $this->addError('phone', '账号密码错误！');
        }
        if (!$user_repository->checkPassword($this->password, $model->password)) {
            $this->addError('phone', '账号密码错误！');
        }
        $this->model = $model;
    }
}