<?php
/**
 * Created by PhpStorm.
 * User: mac
 * Date: 2018/5/7
 * Time: 下午3:24
 */

namespace App\Http\Controllers\Web\Admin;


use App\Http\Controllers\Web\BaseController;

class ImageController extends BaseController
{
    public function upload()
    {
        $file = array_get(request()->all(),'file');
        dd($file);
    }
}