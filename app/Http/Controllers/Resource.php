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

    /**
     * 添加参数
     * @param $value
     * @param string $key
     */
    public static function addParam($value, $key = '')
    {
        if ($key) {
            $param = isset(self::$params[$key]) ? self::$params[$key] : array();
            self::$params[$key] = array_merge($param, $value);
        } else {
            $params = array_merge(self::$params, $value);
            self::$params = $params;
        }
    }

    /**
     * 返回参数
     * @return array
     */
    public static function getAllParams()
    {
        return self::$params;
    }
}