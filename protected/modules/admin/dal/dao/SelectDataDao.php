<?php
/**
 * Created by PhpStorm.
 * User: liangfeng
 * Date: 16/3/31
 * Time: 00:40
 */
class SelectDataDao{
    private static $_instance;
    private function __construct(){}
    public function __clone()
    {
        // TODO: Implement __clone() method.
    }
    public static function getInstance(){
        if(!(self::$_instance instanceof self)){
            self::$_instance = new self;
        }
        return self::$_instance;
    }

    /**
     * 查找固有信息
     * @param $stuId
     * @return mixed
     */
    public static function selectAttributeByStuId($stuId){
        $sql = 'select * from user_attribute where user_stuid = '.$stuId;
        $command = Yii::app()->db->createCommand($sql);
        return $command->queryRow();
    }
    /**
     * 查找固有信息
     * @param $stuId
     * @return mixed
     */
    public static function selectOtherInfoByStuId($stuId){
        $sql = 'select * from user_otherinfo where user_stuid = '.$stuId;
        $command = Yii::app()->db->createCommand($sql);
        return $command->queryRow();
    }
    /**
     * 查找学校信息
     * @param $stuId
     * @return mixed  一维数组
     */
    public static function selectSchoolByStuId($stuId){
        $sql = 'select * from user_schoolinfo where user_stuid = '.$stuId;
        $command = Yii::app()->db->createCommand($sql);
        return $command->queryRow();
    }
    /**
     * 查找语言信息
     * @param $stuId
     * @return mixed  多维数组
     */
    public static function selectLanguageByStuId($stuId){
        $sql = 'select * from user_language where user_stuid = '.$stuId;
        $command = Yii::app()->db->createCommand($sql);
        return $command->queryAll();
    }

    /**
     * 查找学校信息
     * @param $schId
     * @return mixed
     */
    public static function selectSchoolInfoBySchId($schId){
        $sql = 'select * from school where school_id = '.$schId;
        $command = Yii::app()->db->createCommand($sql);
        return $command->queryRow();
    }

    /**
     * 获取订单信息
     * @param $stuId
     * @return mixed
     */
    public static function selectOrderInfo($stuId){
        $sql = 'select * from orders where order_user_stuid = '.$stuId.' order by order_time desc';
        $command = Yii::app()->db->createCommand($sql);
        return $command->queryAll();
    }


    /**
     * 获取订单详情信息
     * @param $orderId   订单ID
     * @return mixed
     */
    public static function selectOrderDetailInfo($orderId){
        $sql = 'select * from order_food_detail where orderid = '.$orderId;
        $command = Yii::app()->db->createCommand($sql);
        return $command->queryAll();
    }

    /**
     * 获取经历列表信息
     * @param $stuId
     * @return mixed
     */
    public static function selectExperienceInfo($stuId){
        $sql = 'select * from user_experience where exp_stuid = '.$stuId;
        $command = Yii::app()->db->createCommand($sql);
        return $command->queryAll();
    }

    /**
     * 获取单个经历信息
     * @param $stuId
     * @param $expId
     * @return mixed
     */
    public static function selectSingleExperienceInfo($stuId,$expId){
        $sql = 'select * from user_experience where exp_stuid = '.$stuId.' and exp_id = '.$expId;
        $command = Yii::app()->db->createCommand($sql);
        return $command->queryAll();
    }

    public static function selectUserInfo($stuId){
        $sql = 'select * from user_otherInfo where user_stuid = '.$stuId;
        $command = Yii::app()->db->createCommand($sql);
        return $command->queryRow();
    }
}
