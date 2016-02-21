<?php

namespace Home\Controller;


class IndexController extends BaseController
{
    public function index()
    {
        $this->page_title = tpx_config_get('home_title');
        $this->page_keywords = tpx_config_get('home_keywords');
        $this->page_description = tpx_config_get('home_description');
        $this->display();
    }
}