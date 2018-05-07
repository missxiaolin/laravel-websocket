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
use App\Src\From\Image\ImageForm;
use Illuminate\Support\Facades\Storage;

class ImageController extends BaseController
{
    /**
     * 图片上传
     * @param ImageForm $form
     * @return \Illuminate\Http\JsonResponse
     * @throws \xiaolin\Enum\Exception\EnumException
     */
    public function upload(ImageForm $form)
    {
        $data = request()->all();
        $form->validate($data);
        $file = array_get($data, 'file');
        if ($file && $file->isValid()) {
            // 扩展名
            $ext = $file->getClientOriginalExtension();
            // 临时文件绝对路径
            $realPath = $file->getRealPath();
            $fileName = date('Y-m-d-H-i-s') . '-' . uniqid() . '.' . $ext;
            Storage::disk('uploads')->put($fileName, file_get_contents($realPath));
            return api_response(['image' => '/uploads/' . $fileName]);
        }
        return api_error(ErrorCode::$ENUM_SYSTEM_TIMEOUT);
    }
}