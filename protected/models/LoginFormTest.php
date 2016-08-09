<?php
/**
 * Created by PhpStorm.
 * User: liangfeng
 * Date: 15-12-30
 * Time: 下午1:37
 */
class LoginFormTest extends CFormModel{
	public $username;
	public $password;
	public $rememberMe = false;
	public function rules(){
		return array(
			array('username,pasword','required'),
			array('rememberMe','boolean'),
			array('password','authenticate'),
		);
	}
}