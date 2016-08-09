<?php
/**
 * Created by PhpStorm.
 * User: liangfeng
 * Date: 16/4/8
 * Time: 23:15
 */
class FoodModel{
    public function getFoodData($id){
        if(is_array($id)){
            $key = 'getFoodData'.implode($id);
        }else{
            $key = 'getFoodData'.$id;
        }
        $data = CacheTools::getMemcacheCom(
                                            'SellerDao',
                                            'getFoodDataByRestaurantId',
                                             array($id),
                                             $key,
                                             array('expire'=>86400)
        );
        return $data;
    }
}