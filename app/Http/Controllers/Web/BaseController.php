<?php

namespace App\Http\Controllers\Web;


use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class BaseController extends Controller
{
    protected $title = '小林专属';
    protected $meta_title = '';
    protected $meta_keyword = '';
    protected $meta_description = '';

    /**
     * @param $title
     * @param $keyword
     * @param $description
     */
    public function setSeo($title, $keyword, $description)
    {
        $this->meta_title = $title;
        $this->meta_keyword = $keyword;
        $this->meta_description = $description;
    }

    /**
     * @param $view
     * @param array $data
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    protected function view($view, $data = [])
    {
        $data = array_merge(
            array(
                'debug' => config('page.debug'),
                'title' => $this->title,
                'host' => config('page.host'),
                'base_url' => config('page.host') . '/js',
                'user' => $this->getUser(),
            ),
            $data
        );
        return view($view, $data);
    }

    /**
     * 获取用户
     * @return mixed
     */
    public function getUser()
    {
        return Auth::guard('web')->user();
    }

}
