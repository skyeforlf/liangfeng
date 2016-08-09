<?php
/**
 * Created by PhpStorm.
 * User: liangfeng
 * Date: 16/3/30
 * Time: 10:41
 */
class UpdateDataDao{
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
     * 修改用户固有注册信息,也就是固有信息
     * @param $item
     * @param $itemValue
     * @param $stuId
     * @return mixed
     */
    public static function updateAttribute($item,$itemValue,$stuId){
        $sql = 'update user_attribute set '.$item.' = :itemValue where user_stuid = :stuId';
        $command = Yii::app()->db->createCommand($sql);
        $command->bindParam(':itemValue',$itemValue,PDO::PARAM_STR);
        $command->bindParam(':stuId',$stuId,PDO::PARAM_STR);
        return $command->execute();
    }

    /**
     * 修改用户附加信息
     * @param $item
     * @param $itemValue
     * @param $stuId
     * @return mixed
     */
    public static function updateOtherInfo($item,$itemValue,$stuId){
        $sql = 'update user_otherinfo set '.$item.' = :itemValue where user_stuid = :stuId';
        $command = Yii::app()->db->createCommand($sql);
        $command->bindParam(':itemValue',$itemValue,PDO::PARAM_STR);
        $command->bindParam(':stuId',$stuId,PDO::PARAM_STR);
        return $command->execute();
    }
    /**
     * 修改用户学校信息
     * @param $item
     * @param $itemValue
     * @param $stuId
     * @return mixed
     */
    public static function updateSchoolInfo($item,$itemValue,$stuId){
        $sql = 'update user_schoolinfo set '.$item.' = :itemValue where user_stuid = :stuId';
        $command = Yii::app()->db->createCommand($sql);
        $command->bindParam(':itemValue',$itemValue,PDO::PARAM_STR);
        $command->bindParam(':stuId',$stuId,PDO::PARAM_STR);
        return $command->execute();
    }

    /**
     * 查找用户是否存在
     * @param $stuId
     * @return mixed
     */
    public static function selectUserByStuId($stuId){
        $sql = 'select user_id from user_attribute where user_stuid = '.$stuId;
        $command = Yii::app()->db->createCommand($sql);
        return $command->queryRow();
    }

    public static function updateExperience($data){
        $sql = 'update user_experience set exp_title = :title,exp_place = :place,exp_time=:expTime,exp_content=:content where exp_id=:expId and exp_stuid=:stuId';
        $command = Yii::app()->db->createCommand($sql);
        $command->bindParam(':title',$data['title'],PDO::PARAM_STR);
        $command->bindParam(':place',$data['place'],PDO::PARAM_STR);
        $command->bindParam(':expTime',$data['time'],PDO::PARAM_STR);
        $command->bindParam(':content',$data['content'],PDO::PARAM_STR);
        $command->bindParam(':expId',$data['expId'],PDO::PARAM_STR);
        $command->bindParam(':stuId',$data['stuId'],PDO::PARAM_STR);
        return $command->execute();

    }
}
