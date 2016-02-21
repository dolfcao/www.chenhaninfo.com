<?php

namespace Common\Service;

class SinglePageService
{
    public function all($cache = 3600, $options = array('limit' => 999))
    {
        $flag = 'single_page/all/' . md5($cache . serialize($options));
        $data = S($flag);
        if (false === $data) {
            $data = D('CmsSinglePage')->order('id ASC')->limit($options ['limit'])->select();
            S($flag, $data, $cache);
        }
        return $data;
    }

    public function page($url, $cache = 3600, $options = array('limit' => 999))
    {
        $flag = 'single_page/page/' . $url . '/' . md5($cache . serialize($options));
        $data = S($flag);
        if (false === $data) {
            $data = D('CmsSinglePage')->where(array('url' => $url))->find();
            S($flag, $data, $cache);
        }
        return $data;

    }
}