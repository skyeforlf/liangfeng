<?php
/**
 * Created by PhpStorm.
 * User: liangfeng
 * Date: 16/4/8
 * Time: 23:14
 */
class RestaurantModel{
    /**
     * 获取所有餐厅
     * @return mixed
     */
    public function getRestaurantData(){
        $data = CacheTools::getMemcacheCom(
                                            'SellerDao',
                                            'getRestautantDataById',
                                             array(),
                                            'getRestaurantData',
                                             array('expire'=>86400)
        );
        return $data;
    }

    /**
     * 获取单个餐厅
     * @param $id
     * @return mixed
     */
    public function getSingleRestaurantData($id){
        $data = CacheTools::getMemcacheCom(
                                            'SellerDao',
                                            'getRestautantDataById',
                                             array($id),
                                            'getSingleRestaurantData'.$id,
                                             array('expire'=>86400)
        );
        return $data;
    }
}