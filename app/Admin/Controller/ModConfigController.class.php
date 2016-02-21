<?php

namespace Admin\Controller;

class ModConfigController extends ModController
{
    static $export_menu = array(
        'content' => array(
            '网站设置' => array(
                'basic' => array(
                    'title' => '基本设置',
                    'hiddens' => array()
                ),
                'contact' => array(
                    'title' => '联系方式',
                    'hiddens' => array()
                ),
                'counter' => array(
                    'title' => '访问统计',
                    'hiddens' => array()
                ),
            )
        )
    );

    public function basic()
    {
        $keys = array(
            'home_title',
            'home_keywords',
            'home_description'
        );
        if (IS_POST) {
            $data = array();
            foreach ($keys as &$k) {
                tpx_config($k, I('post.' . $k, '', 'trim'));
            }
            $this->success('保存成功');
        }

        foreach ($keys as &$k) {
            $kk = "data_$k";
            $this->$kk = tpx_config($k);
        }

        $this->display('ModConfig:basic');
    }

    public function counter()
    {
        $keys = array(
            'code_counter',
        );
        if (IS_POST) {
            $data = array();
            foreach ($keys as &$k) {
                tpx_config($k, I('post.' . $k, '', 'trim'));
            }
            $this->success('保存成功');
        }

        foreach ($keys as &$k) {
            $kk = "data_$k";
            $this->$kk = tpx_config($k);
        }

        $this->display('ModConfig:counter');
    }

    public function contact()
    {
        $keys = array(
            'contact_address',
            'contact_email',
            'contact_website',
            'contact_tel',
            'contact_qq'
        );
        if (IS_POST) {
            $data = array();
            foreach ($keys as &$k) {
                tpx_config($k, I('post.' . $k, '', 'trim'));
            }
            $this->success('保存成功');
        }

        foreach ($keys as &$k) {
            $kk = "data_$k";
            $this->$kk = tpx_config($k);
        }

        $this->display('ModConfig:contact');
    }

}