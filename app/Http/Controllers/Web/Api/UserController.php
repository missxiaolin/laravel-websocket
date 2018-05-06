<?php
/**
 * Created by PhpStorm.
 * User: mac
 * Date: 2018/5/6
 * Time: 下午12:55
 */

namespace App\Http\Controllers\Web\Api;


use App\Http\Controllers\Web\BaseController;
use App\Src\From\User\LoginFrom;
use Illuminate\Support\Facades\Auth;

class UserController extends BaseController
{
    /**
     * @param LoginFrom $from
     * @return \Illuminate\Http\JsonResponse
     */
    public function login(LoginFrom $from)
    {
        $data = request()->all();
        $from->validate($data);
        Auth::guard('web')->loginUsingId($from->model->id);
        return response()->json([], 200);
    }
}