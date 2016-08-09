<?php
/**
 * Created by PhpStorm.
 * User: liangfeng
 * Date: 2016/3/8
 * Time: 9:33
 */
class HeaderMainWidget extends CWidget{
    //主导航的数据
    public $headerData = array();

    //$headerData['logoUrl'] = '/images/logo.png';
    //$headerData['nav'] = array(
    //     'name'=> '名字',
    //     'url'=>'url',
    //     'active'=>true,
    //     'isTwo'=>false,
    //二级  'navTwo'=>array(
    //          //'名称'=>'url',
    //      ),
    //);

    //初始化函数
    public function init(){

    }
    //运行函数
    public function run(){
        $this->render('header-main',$this->headerData);
    }
}