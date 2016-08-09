<?php
/**
 * Created by PhpStorm.
 * User: liangfeng
 * Date: 16/8/3
 * Time: 15:04
 */
class MobileDao{
    private static $_instance;
    private function __construct (){}
    public function __clone ()
    {
        // TODO: Implement __clone() method.
        trigger_error("MoileDao not allow clone!",E_USER_ERROR);
    }
    public static function getInstance(){
        if(!(self::$_instance instanceof self)){
            self::$_instance = new self;
        }
        return self::$_instance;
    }

    /**
     * 注册用户
     * @param $params
     * @return mixed
     */
    public function writeInUserRegInfo($params){
        $sql = 'INSERT INTO table_user';
        $sql .= ' (u_name,u_tel,u_secret_key,u_password,u_email,u_sex,u_birthday,u_introduction,u_reg_date)';
        $sql .= ' VALUES (:name,:tel,:secretKey,:password,:email,:sex,:birthday,:introduction,now())';
        $commmand = Yii::app()->db->createCommand($sql);
        $commmand->bindParam(':name',$params['username'],PDO::PARAM_STR);
        $commmand->bindParam(':tel',$params['tel'],PDO::PARAM_STR);
        $commmand->bindParam(':secretKey',$params['secretKey'],PDO::PARAM_STR);
        $commmand->bindParam(':password',$params['password'],PDO::PARAM_STR);
        $commmand->bindParam(':email',$params['email'],PDO::PARAM_STR);
        $commmand->bindParam(':sex',$params['sex'],PDO::PARAM_STR);
        $commmand->bindParam(':birthday',$params['birthday'],PDO::PARAM_STR);
        $commmand->bindParam(':introduction',$params['introduction'],PDO::PARAM_STR);
        return $commmand->execute();
    }

    public function selectUserByTel($tel){
        $sql = 'SELECT u_id,u_name,u_tel,u_secret_key FROM table_user WHERE u_tel = '.$tel;
        $command = Yii::app()->db->createCommand($sql);
        return $command->queryRow();
    }
}