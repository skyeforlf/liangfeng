<?php
/**
 * Created by PhpStorm.
 * User: liangfeng
 * Date: 16/3/31
 * Time: 00:42
 */
class SelectDataModel{
    /**
     * 查询基础信息,注册信息
     * @param $stuId
     * @return bool|mixed
     */
    public function selectAttributeByStuId($stuId){
        $data = CacheTools::getMemcacheCom('SelectDataDao',
                                            'selectAttributeByStuId',
                                            array($stuId),
                                            AdminMemcacheKey::SELECT_ATTRIBUTE_INFO.$stuId,
                                            array('expire'=>86400)
        );
        if(empty($data)){
            return false;
        }
        return $data;
    }

    /**
     * 查询其他信息
     * @param $stuId
     * @return bool|mixed
     */
    public function selectOtherInfoByStuId($stuId){
        $data = CacheTools::getMemcacheCom('SelectDataDao',
                                            'selectOtherInfoByStuId',
                                            array($stuId),
                                            AdminMemcacheKey::SELECT_OTHERINFO_INFO.$stuId,
                                            array('expire'=>86400)
        );
        if(empty($data)){
            return false;
        }
        return $data;
    }

    /**
     * 查询学校与语言信息
     * @param $stuId
     */
    public function selectSchAndLangByStuId($stuId){
        $data['school'] = CacheTools::getMemcacheCom('SelectDataDao',
                                                    'selectSchoolByStuId',
                                                    array($stuId),
                                                    AdminMemcacheKey::SELECT_USER_SCHOOL_INFO.$stuId,
                                                    array('expire'=>86400)
        );
        $data['language'] = CacheTools::getMemcacheCom('SelectDataDao',
                                                    'selectLanguageByStuId',
                                                    array($stuId),
                                                    AdminMemcacheKey::SELECT_LANGUAGE_INFO.$stuId,
                                                    array('expire'=>86400)
        );
        return $data;
    }

    /**
     * 查找学校的信息通过学校ID
     * @param $schId
     */
    public function selectSchoolInfo($schId){
        return CacheTools::getMemcacheCom('SelectDataDao',
                                            'selectSchoolInfoBySchId',
                                            array($schId),
                                            AdminMemcacheKey::SELECT_SCHOOL_INFO.$schId,
                                            array('expire'=>86400)
        );
    }

    /**
     * 返回订单信息并且存到缓存中
     * @param $stuId
     * @return mixed
     */
    public function selectOrderInfo($stuId){
        $orders = CacheTools::getMemcacheCom('SelectDataDao',
                                            'selectOrderInfo',
                                            array($stuId),
                                            AdminMemcacheKey::SELECT_ORDER_INFO.$stuId,
                                            array('expire'=>86400)
        );
        if(!empty($orders)){
            $ids = array();
            foreach($orders as $order){
                $ids[] = $order['order_id'];
            }
        }
        $orderDetailInfo = $this->selectOrderDetailInfo($ids);
        $ordersInfo = array();
        foreach($orders as $order){
            if(!empty($orderDetailInfo[$order['order_id']])){
                $order['detailInfo'] = $orderDetailInfo[$order['order_id']];
                $order['order_remark'] = mb_strlen($order['order_remark'],'utf-8')>12 ? mb_substr($order['order_remark'],0,12,'utf-8').'...' : $order['order_remark'];
                $ordersInfo[]=$order;
            }
        }
        return $ordersInfo;
    }

    /**
     * 通过一套orderId  获取所有的订单详情
     * @param $orderIds
     * @return array
     */
    public function selectOrderDetailInfo($orderIds){
        $orderDetailInfo = array();
        if(!empty($orderIds)){
            foreach($orderIds as $orderId){
                $orderDetailInfo[$orderId] = CacheTools::getMemcacheCom('SelectDataDao',
                    'selectOrderDetailInfo',
                    array($orderId),
                    AdminMemcacheKey::SELECT_ORDER_DETAIL_INFO.$orderId,
                    array('expire'=>86400)
                );
            }
        }
        return $orderDetailInfo;
    }

    /**
     * 获取
     * @param $stuId
     * @return mixed
     */
    public function selectExperienceInfo($stuId,$expId = null){
        if(empty($expId)){
            return CacheTools::getMemcacheCom('SelectDataDao',
                'selectExperienceInfo',
                array($stuId),
                AdminMemcacheKey::SELECT_EXPERIENCE_INFO.$stuId,
                array('expire'=>600)
            );
        }else{
            return CacheTools::getMemcacheCom('SelectDataDao',
                'selectSingleExperienceInfo',
                array($stuId,$expId),
                AdminMemcacheKey::SELECT_SINGLE_EXPERIENCE_INFO.$stuId.'::'.$expId,
                array('expire'=>60)
            );
        }
    }

    public function selectUserInfo($stuId){
        $face = CacheTools::getMemcacheCom('SelectDataDao',
            'selectUserInfo',
            array($stuId),
            'select::user::info::'.$stuId,
            array('expire'=>86400)
        );
        $user['face'] = $face['user_facepic'];
        $user['name'] = Cookie::getCookie('user_name');
        $user['time'] = date('Y-m-d',time());
        return $user;
    }
}
