<?php
/**
 * Created by PhpStorm.
 * User: liangfeng
 * Date: 2016/3/8
 * Time: 12:21
 */
return array(
    'logoUrl' => '/images/logo.png',
    'active' => '首页',
    'nav' => array(
        array(
            'name' => '首页',
            'url' => DOMAIN_NAME,
            'isTwo'=>false,
        ),
        array(
            'name' => '个人中心',
            'url' => DOMAIN_NAME.'/index.php?r=admin/index/index',
            'isTwo'=>false,
        ),
        array(
            'name' => '生活应用',
            'isTwo' => true,
            'navTwo' => array(
                '个人简历' => DOMAIN_NAME.'/index.php?r=resume/index/index',
                '校园订餐' => DOMAIN_NAME.'/index.php?r=takeout/seller/index',
                '扩展功能1' => '#',
                '扩展功能2' => '#',
                '扩展功能3' => '#',
            ),
        ),
        array(
            'name' => '博客',
            'url' => 'index.php?r=blog/blog/index',
            'isTwo'=>false,
        ),
        array(
            'name' => '关于我们',
            'url' => '#',
            'isTwo'=>false,
        ),
        array(
            'name' => '联系我们',
            'url' => '#',
            'isTwo'=>false,
        ),
        array(
            'name' => '登录',
            'url' => DOMAIN_NAME.'/index.php?r=login/index',
            'isTwo'=>false,
        )
    ),
);
