<?php
/**
 * Created by PhpStorm.
 * User: liangfeng
 * Date: 2016/1/11
 * Time: 9:40
 */
class UserDao{
	public function __construct(){

	}
	public function writeDataToUser($params){
		$sql = 'INSERT INTO user_attribute (
										user_name,
										user_stuid,
										user_pwd,
										user_tel,
										user_qq,
										user_email,
										user_reg_date
									  )
				VALUES
									  (
										:username,
										:studentId,
										:password,
										:telephone,
										:qq,
										:email,
										now()
									  )';
		$command = Yii::app()->db->createCommand($sql);
		$command->bindParam(":username",$params['username'],PDO::PARAM_STR);
		$command->bindParam(":studentId",$params['studentId'],PDO::PARAM_STR);
		$command->bindParam(":password",$params['password'],PDO::PARAM_STR);
		$command->bindParam(":telephone",$params['telephone'],PDO::PARAM_STR);
		$command->bindParam(":qq",$params['qq'],PDO::PARAM_STR);
		$command->bindParam(":email",$params['email'],PDO::PARAM_STR);
		return $command->execute();
	}
	public function findDuplicateStudentId($studentId){
		$sql = 'select user_id from user_attribute where user_stuid = :studentId';
		$command = Yii::app()->db->createCommand($sql);
		$command->bindParam(":studentId",$studentId,PDO::PARAM_STR);
		$result = $command->queryAll();
		if(empty($result)){
			return false;
		}
		return true;
	}
	public function findDuplicateTelephone($telephone){
		$sql = 'select user_id from user_attribute where user_tel = :tel';
		$command = Yii::app()->db->createCommand($sql);
		$command->bindParam(":tel",$telephone,PDO::PARAM_STR);
		$result = $command->queryAll();
		if(empty($result)){
			return false;
		}
		return true;
	}
	public function findDuplicateQQ($qq){
		$sql = 'select user_id from user_attribute where user_qq = :qq';
		$command = Yii::app()->db->createCommand($sql);
		$command->bindParam(":qq",$qq,PDO::PARAM_STR);
		$result = $command->queryAll();
		if(empty($result)){
			return false;
		}
		return true;
	}
	public function loginByStudentId($id,$psw){
		$sql = 'select user_id from user_attribute where user_stuid = :studentId and user_pwd = :password';
		$command = Yii::app()->db->createCommand($sql);
		$command->bindParam(":studentId",$id,PDO::PARAM_STR);
		$command->bindParam(":password",$psw,PDO::PARAM_STR);
		return $command->queryRow();
	}
	public function loginByQQ($id,$psw){
		$sql = 'select user_id from user_attribute where user_qq = :qq and user_pwd = :password';
		$command = Yii::app()->db->createCommand($sql);
		$command->bindParam(":qq",$id,PDO::PARAM_STR);
		$command->bindParam(":password",$psw,PDO::PARAM_STR);
		return $command->queryRow();
	}
	public function loginByTelephone($id,$psw){
		$sql = 'select user_id from user_attribute where user_tel = :tel and user_pwd = :password';
		$command = Yii::app()->db->createCommand($sql);
		$command->bindParam(":tel",$id,PDO::PARAM_STR);
		$command->bindParam(":password",$psw,PDO::PARAM_STR);
		return $command->queryRow();
	}
	public function userLogin($id,$psw){
		$sql = 'select user_id,user_name,user_tel,user_stuid,user_qq from user_attribute where (user_tel = :id OR user_stuid = :id or user_qq = :id) and user_pwd = :password';
		$command = Yii::app()->db->createCommand($sql);
		$command->bindParam(":id",$id,PDO::PARAM_STR);
		$command->bindParam(":password",$psw,PDO::PARAM_STR);
		return $command->queryRow();
	}
}