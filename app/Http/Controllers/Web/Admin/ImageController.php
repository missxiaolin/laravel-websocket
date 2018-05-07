<?php
/**
 * Created by PhpStorm.
 * User: mac
 * Date: 2018/5/7
 * Time: 下午3:24
 */

namespace App\Http\Controllers\Web\Admin;


use App\Core\Enums\ErrorCode;
use App\Http\Controllers\Web\BaseController;
use Illuminate\Support\Facades\Storage;

class ImageController extends BaseController
{
    public function upload()
    {
        $file = array_get(request()->all(), 'file');
        if ($file && $file->isValid()) {
            // 原文件名字
            $originalName = $file->getClientOriginalName();
            // 扩展名
            $ext = $file->getClientOriginalExtension();
            // 文件类型
            $type = $file->getClientMimeType();
            // 临时文件绝对路径
            $realPath = $file->getRealPath();

            $fileName = date('Y-m-d-H-i-s') . '-' . uniqid() . '.' . $ext;

            Storage::disk('uploads')->put($fileName, file_get_contents($realPath));
            return api_response(['image'=>$fileName]);
        }
        return api_error(ErrorCode::$ENUM_SYSTEM_TIMEOUT);
    }
}