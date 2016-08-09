<?php
/**
 * Created by PhpStorm.
 * User: liangfeng
 * Date: 2016/3/1
 * Time: 16:23
 */
class UserInfoDao{
    private static $_instance;

    private function __construct()
    {
    }
    private function __clone()
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
     * 获取用户的固有信息
     * @param $stuid
     * @return mixed
     */
    public static function getUserFixedInfoByStuid($stuid){
        $sql = 'select * from user_attribute where user_stuid = :stuid';
        $command = Yii::app()->db->createCommand($sql);
        $command->bindParam(':stuid',$stuid,PDO::PARAM_STR);
        return $command->queryRow();
    }

    /**
     * 获取用户额外信息,可以获取用户的头像等信息
     * @param $stuid
     * @return mixed
     */
    public static function getUserBaseInfoByStuid($stuid){
        $sql = 'select * from user_otherinfo where user_stuid = :stuid';
        $command = Yii::app()->db->createCommand($sql);
        $command->bindParam(':stuid',$stuid,PDO::PARAM_STR);
        return $command->queryRow();
    }

    /**
     * 更新用户的头像信息
     * @param $info
     * @return mixed
     */
    public static function updateUserFaceInfo($info){

        $sql = 'update user_otherinfo set user_facepic = :facepic,user_facepic_left = :facepic_left,user_facepic_top = :facepic_top,user_facepic_right = :facepic_right,user_facepic_bottom = :facepic_bottom where user_stuid = :stuId';
        $command = Yii::app()->db->createCommand($sql);
        $command->bindParam(':facepic',$info['name'],PDO::PARAM_STR);
        $command->bindParam(':facepic_left',$info['left'],PDO::PARAM_INT);
        $command->bindParam(':facepic_top',$info['top'],PDO::PARAM_INT);
        $command->bindParam(':facepic_right',$info['right'],PDO::PARAM_INT);
        $command->bindParam(':facepic_bottom',$info['bottom'],PDO::PARAM_INT);
        $command->bindParam(':stuId',$info['stuId'],PDO::PARAM_STR);
        return $command->execute();
    }
}