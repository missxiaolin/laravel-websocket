<?php
/**
 * Created by PhpStorm.
 * User: mac
 * Date: 2018/5/1
 * Time: 上午10:49
 */

namespace App\Http\Controllers;

class Resource
{
    private static $params = array();

    public static function getAllParams()
    {
        return self::$params;
    }
}