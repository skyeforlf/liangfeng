<?php
/**
 * Created by PhpStorm.
 * User: liangfeng
 * Date: 2016/1/12
 * Time: 8:41
 */
class Validate{
	private static $_instance;
	private function __construct(){}
	public function __clone(){}
	public static function getInstance(){
		if(!(self::$_instance instanceof self)){
			self::$_instance = new self;
		}
		return self::$_instance;
	}
	public static function validateUsername($username){
		if(preg_match('/[ !@#$%^&*()_+-<>?]/',$username)){
			return '用户名包含非法字符！';
		}
		if(strlen($username)<2||strlen($username)>40){
			return '用户名小于2位或者大于40位！';
		}
		return null;
	}
	public static function validateStudentId($stuid){
		if(!preg_match('/[0-9]{5,20}/',$stuid)){
			return '学号格式不正确！';
		}
		return null;
	}
	public static function validatePassword($passwordOne,$passwordTwo,$min,$max){
		if($passwordOne!=$passwordTwo){
			return '密码与确认密码不一致！';
		}
		if(preg_match('/[<>!$%^&*()]/',$passwordOne)){
			return '密码包含非法字符！';
		}
		if(strlen($passwordOne)<$min||strlen($passwordOne)>$max){
			return '用户名小于'.$min.'位或者大于'.$max.'位！';
		}
		return null;
	}
	public static function validateQQ($qq){
		if(!preg_match('/^[1-9][0-9]{5,9}$/',$qq)){
			return 'QQ号码格式不正确！';
		}
		return null;
	}
	public static function validateTelephone($telephone){
		if(!preg_match('/^[1][34578]{1}[0-9]{9}$/',$telephone)){
			return '手机号码格式不正确！';
		}
		return null;
	}
	public static function validateEmail($email){
		if(!preg_match("/^([0-9A-Za-z\\-_\\.]+)@([0-9a-z]+\\.[a-z]{2,3}(\\.[a-z]{2})?)$/i",$email)){
			return '邮箱格式不正确！';
		}
		return null;
	}
	public function validate($params){
		$errorMessage = '';
		$errorMessage .= self::validateUsername($params['username']);
		$errorMessage .= self::validateStudentId($params['studentId']);
		$errorMessage .= self::validatePassword($params['password'],$params['validatePwd'],6,20);
		$errorMessage .= self::validateTelephone($params['telephone']);
		$errorMessage .= self::validateQQ($params['qq']);
		$errorMessage .= self::validateEmail($params['email']);
		if($errorMessage == ''){
			return false;
		}else{
			return $errorMessage;
		}
	}
}