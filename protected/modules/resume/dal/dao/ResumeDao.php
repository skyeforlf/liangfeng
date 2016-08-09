<?php
/**
 * Created by PhpStorm.
 * User: liangfeng
 * Date: 16/3/28
 * Time: 11:13
 */
class ResumeDao{

    private static $_instance;

    private function __construct(){}
    private function __clone()
    {
        // TODO: Implement __clone() method.
    }

    /**
     * 获取单列模式的对象
     * @return BlogDetailDao
     */
    public static function getInstance(){
        if(!(self::$_instance instanceof self)){
            self::$_instance = new self;
        }
        return self::$_instance;
    }

    /**
     * 获取用户基础信息
     * @param $stuId
     * @return mixed
     */
    public static function getUserAttribute($stuId){
        $sql = 'select * from user_attribute where user_stuid = :stuId';
        $command = Yii::app()->db->createCommand($sql);
        $command->bindParam(':stuId',$stuId,PDO::PARAM_STR);
        return $command->queryRow();
    }

    /**
     * 获取用户额外信息
     * @param $stuId
     * @return mixed
     */
    public static function getUserOtherInfo($stuId){
        $sql = 'select * from user_otherinfo where user_stuid = :stuId';
        $command = Yii::app()->db->createCommand($sql);
        $command->bindParam(':stuId',$stuId,PDO::PARAM_STR);
        return $command->queryRow();
    }

    /**
     * 获取用户技能信息
     * @param $stuId
     * @return mixed
     */
    public static function getUserSkill($stuId){
        $sql = 'select * from user_skill where user_stuid = :stuId';
        $command = Yii::app()->db->createCommand($sql);
        $command->bindParam(':stuId',$stuId,PDO::PARAM_STR);
        return $command->queryAll();
    }

    /**
     * 获取用户学校信息
     * @param $stuId
     * @return mixed
     */
    public static function getUserSchoolInfo($stuId){
        $sql = 'select * from user_schoolinfo where user_stuid = :stuId';
        $command = Yii::app()->db->createCommand($sql);
        $command->bindParam(':stuId',$stuId,PDO::PARAM_STR);
        return $command->queryRow();
    }

    /**
     * 获取用户语言信息
     * @param $stuId
     * @return mixed
     */
    public static function getUserLanguage($stuId){
        $sql = 'select * from user_language where user_stuid = :stuId';
        $command = Yii::app()->db->createCommand($sql);
        $command->bindParam(':stuId',$stuId,PDO::PARAM_STR);
        return $command->queryAll();
    }
    /**
     * 学校
     * @param $stuId
     * @return mixed
     */
    public static function getSchool($schoolId){
        $sql = 'select * from school where school_id = :schoolId';
        $command = Yii::app()->db->createCommand($sql);
        $command->bindParam(':schoolId',$schoolId,PDO::PARAM_INT);
        return $command->queryRow();
    }

    /**
     * 获取经历列表信息
     * @param $stuId
     * @return mixed
     */
    public static function getExperienceInfo($stuId){
        $sql = 'select * from user_experience where exp_stuid = '.$stuId;
        $command = Yii::app()->db->createCommand($sql);
        return $command->queryAll();
    }
}
