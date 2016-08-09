<?php
/**
 * Created by PhpStorm.
 * User: liangfeng
 * Date: 2016/1/5
 * Time: 9:23
 */
class RegisterForm{

	private $username;
	private $studentId;
	private $password;
	private $telephone;
	private $validatePwd;
	private $qq;
	private $email;
	private $userDao;
	public function __construct(){

	}
	public function init($params){
		if(empty($params)){
			return null;
		}
		$this->validatePwd = $params['validatePwd'];
		$this->username = $params['username'];
		$this->studentId = $params['studentId'];
		$this->password = $params['password'];
		$this->telephone = $params['telephone'];
		$this->qq = $params['qq'];
		$this->email = $params['email'];
		$this->userDao = new UserDao();
	}
	public function register(){

		$resultString = $this->validateUserUnique();

		if($resultString['success']){
			$params = array();
			$params['validatePwd'] = $this->validatePwd;
			$params['username'] = $this->username;
			$params['studentId'] = $this->studentId;
			$params['password'] = $this->password;
			$params['telephone'] = $this->telephone;
			$params['qq'] = $this->qq;
			$params['email'] = $this->email;
			$result = $this->userDao->writeDataToUser($params);
			return $result;
		}else{
			return array(
				'success' => false,
				'message' => $resultString['message'],
			);
		}
	}
	public function validateUserUnique(){

		if($resultString = $this->validateStudentId($this->studentId)){
			if($resultString = $this->validateTelephone($this->telephone)){
				$resultString = $this->validateQQ($this->qq);
			}
		}
		if(!$resultString){
			return array(
				'success' => true,
				'message' => "注册用户唯一！",
			);
		}
		return array(
			'success' => false,
			'message' => $resultString,
		);
	}
	public function validateQQ($qq){
		$resultString = null;
		if(empty($qq)||!is_numeric($qq)){
			$resultString = "QQ号为空或者不是数字组成！";
			return $resultString;
		}
		$resultString = $this->userDao->findDuplicateQQ($qq);
		if($resultString){
			$resultString = "QQ号已经被注册过了！";
		}
		return $resultString;
	}
	public function validateTelephone($telephone){
		$resultString = null;
		if(empty($telephone)||!is_numeric($telephone)){
			$resultString = "手机号为空或者不是数字组成！";
		}
		$resultString = $this->userDao->findDuplicateTelephone($telephone);
		if($resultString){
			$resultString = "手机号码已经注册过了！";
		}
		return $resultString;
	}
	public function validateStudentId($studentId){
		$resultString = $this->userDao->findDuplicateStudentId($studentId);
		if($resultString){
			$resultString = "学号已经注册过了！";
		}
		return $resultString;
	}
}