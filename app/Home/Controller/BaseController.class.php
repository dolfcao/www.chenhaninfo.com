<?php

namespace Home\Controller;

use Think\Controller;

class BaseController extends Controller
{

    protected function _initialize()
    {

        if (!file_exists('./_CFG/install.lock')) {
            header('Location: ' . __ROOT__ . '/admin.php');
            exit();
        }

        tpx_upgrade_check();

        $domains = C('APP_SUB_DOMAIN_RULES');
        if (empty($domains)) {
            $this->error('您没有绑定任何域名或IP');
        }
        if (!isset($domains[HTTP_HOST])) {
            $this->error('您访问的域名' . HTTP_HOST . '没有绑定到该系统');
        }
    }
}