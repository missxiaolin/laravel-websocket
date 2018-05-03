<?php

namespace App\Http\Controllers\Web;


use App\Http\Controllers\Controller;

class BaseController extends Controller
{
    protected $title = '小林专属';
    protected $meta_title = '';
    protected $meta_keyword = '';
    protected $meta_description = '';

    public function setSeo($title, $keyword, $description)
    {
        $this->meta_title = $title;
        $this->meta_keyword = $keyword;
        $this->meta_description = $description;
    }

    protected function view($view, $data = [])
    {
        $data = array_merge(
            array(
                'debug' => config('page.debug'),
                'title' => $this->title,
                'host' => config('page.host'),
                'base_url' => config('page.host') . '/js',
            ),
            $data
        );
        return view($view, $data);
    }

}
