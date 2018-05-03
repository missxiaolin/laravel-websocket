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
    use InstanceTrait;

    const SOURCE_EXTERNAL = 'external';
    const SOURCE_INTERNAL = 'internal';

    public $manifest = [];
    private $default = 'mobile';

    private static $params = array();

    private $external_resources = array(
        'js' => array(),
        'css' => array(),
    );
    private $internal_resources = array(
        'js' => array(),
        'css' => array(),
    );

    public $dest_dir = '';

    private $title;

    public function __construct()
    {
        $this->dest_dir = config('page.host') . '/';
    }

    /**
     * @param string $value
     */
    public function setTitle($value)
    {
        $this->title = $value;
    }

    /**
     * @return mixed
     */
    public function getTitle()
    {
        return $this->title;
    }

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

    /**
     * @param string $client_type
     * @param bool $is_pure
     * @return array
     */
    public function loadStyles($client_type = '', $is_pure = false)
    {
        $resources = [
            'internal' => $this->_loadTool(self::SOURCE_INTERNAL, 'css', $client_type, $is_pure),
            'external' => $this->_loadTool(self::SOURCE_EXTERNAL, 'css', $client_type, $is_pure),
        ];
        $this->_suffixTool($resources['internal'], 'css');
        $this->_suffixTool($resources['external'], 'css');
        return $resources;
    }

    /**
     * @param string $client_type
     * @param bool $is_pure
     * @return array
     */
    public function loadScripts($client_type = '', $is_pure = false)
    {
        $resources = [
            'internal' => $this->_loadTool(self::SOURCE_INTERNAL, 'js', $client_type, $is_pure),
            'external' => $this->_loadTool(self::SOURCE_EXTERNAL, 'js', $client_type, $is_pure),
        ];
        $this->_suffixTool($resources['internal'], 'js');
        $this->_suffixTool($resources['external'], 'js');
        return $resources;
    }

    /**
     * Private: get loading resources(without suffix)
     * @param      $source
     * @param      $resource_type
     * @param      $client_type
     * @param bool $is_pure
     * @return array
     */
    private function _loadTool($source, $resource_type, $client_type, $is_pure = false)
    {
        if ($is_pure) {
            return $this->getResources($source, $resource_type, $client_type);
        }
        $default = $client_type ? $client_type : $this->default;
        if ($default != $this->default) {
            $resources = array_unique(array_merge(
                $this->getResources($source, $resource_type, ''),
                $this->getResources($source, $resource_type, $client_type)
            ), SORT_REGULAR);
        } else {
            $resources = $this->getResources($source, $resource_type, $default);
        }

        return $resources;
    }

    /**
     * Get resources.
     *
     * @param        $source
     * @param        $resource_type
     * @param string $client_type
     * @return array
     */
    public function getResources($source, $resource_type, $client_type = '')
    {

        if ($source === self::SOURCE_INTERNAL) {
            $resources = &$this->internal_resources[$resource_type];
        } else {
            $resources = &$this->external_resources[$resource_type];
        }

        $client_type = $client_type ? $client_type : $this->default;

        return isset($resources[$client_type]) ? $resources[$client_type] : array();
    }

    /**
     * Private: add suffix for each loading file.
     * @param $resources
     * @param $resource_type
     * @return mixed
     */
    private function _suffixTool(&$resources, $resource_type)
    {
        foreach ($resources as &$val) {
            $val = $this->realPath($val, $resource_type);
        }
        return $resources;
    }

    /**
     * @param $path
     * @param string $resource_type
     * @param null $dest_dir
     * @return string
     */
    public function realPath($path, $resource_type = 'js', $dest_dir = null)
    {
        $path .= '.' . $resource_type;
        $asset_manifest = $this->_normalizePath($path);

        $hashfile = $this->hashmap('/' . $asset_manifest);

        $dest_dir = (null != $dest_dir) ? $dest_dir : $this->dest_dir;
        $hashfile = ltrim($hashfile, '\/');

        return $dest_dir . $hashfile;
    }

    /**
     * @param $path
     * @return mixed
     */
    public function hashmap($path)
    {
        return isset($this->manifest[$path]) ? $this->manifest[$path] : $path;
    }

    /**
     * Get normal path
     * @param $path string,  '../lib/list.js'
     * @return string 'lib/list.js'
     */
    private function _normalizePath($path)
    {
        $path = str_replace('../', '', $path, $count);
        $parts = explode('/', $path);
        $relative_path = implode('/', array_slice($parts, $count));
        return $relative_path;
    }

    /**
     * Alias for function addExternalCss
     * @param array $data
     * @param string $type client type.
     */
    public function extCss($data = array(), $type = '')
    {
        self::addExternals('css', $data, $type);
    }

    /**
     * Alias for function addExternalJs
     * @param array $data
     * @param string $type client type.
     */
    public function extJs($data = array(), $type = '')
    {
        self::addExternals('js', $data, $type);
    }

    /**
     * @param        $resource_type
     * @param array $data
     * @param string $client_type
     */
    public function addExternals($resource_type, $data = array(), $client_type = '')
    {
        self::addResources(self::SOURCE_EXTERNAL, $resource_type, $data, $client_type);
    }

    /**
     * Add Resources.
     *
     * @param $source : external or internal.
     * @param $resource_type : js or css.
     * @param $data
     * @param $client_type : app or mobile.
     */
    public function addResources($source, $resource_type, $data, $client_type)
    {
        if (!empty($data)) {
            if ($source === self::SOURCE_INTERNAL) {
                $resources = &$this->internal_resources[$resource_type];
            } else {
                $resources = &$this->external_resources[$resource_type];
            }

            $client_type = $client_type ? $client_type : $this->default;
            $suffix = self::get_suffix($client_type);

            if ($suffix) {
                foreach ($data as &$val) {
                    $val .= '.' . $suffix;
                }
            }

            $resources[$client_type] = isset($resources[$client_type]) ? $resources[$client_type] : array();
            $resources[$client_type] = array_unique(array_merge(($resources[$client_type]), $data), SORT_REGULAR);
        }
    }

    /**
     * Get suffix of resource.
     * @param $type
     * @return string. e.g.: app, mobile
     */
    private function get_suffix($type)
    {
        $type = $type ? $type : $this->default;
        $suffix = ($type === $this->default) ? '' : $type;
        return $suffix;
    }
}