<?php
/**
 * Created by PhpStorm.
 * User: liangfeng
 * Date: 16/4/10
 * Time: 22:42
 */
class SellerModel{

    public function insertOrder($params = array()){
        if(empty($params)){
            return false;
        }
        $params['orderId'] = empty($params['stuId']) ? Cookie::getCookie('user_stuid') : $params['stuId'].date('YmdHis').rand(0,1000);
        return SellerDao::insertOrder($params);
    }
}