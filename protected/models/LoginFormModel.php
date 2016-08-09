<?php
/**
 * Created by PhpStorm.
 * User: liangfeng
 * Date: 2016/3/10
 * Time: 9:31
 */
class LoginFormModel{
    private $_idNumber;
    private $_password;
    private $_expire = false;
    private $_userDao;
    public function __construct($id,$pwd,$expire=false){
        $this->_idNumber = $id;
        $this->_password = $pwd;
        $this->_expire = $expire;
        $this->_userDao = new UserDao();
    }

    public function login(){
        $resultData = array(
            'success'=>false,
            'data'=>array(),
        );
        $data = $this->_userDao->userLogin($this->_idNumber,$this->_password);
        if($data) {
            $resultData['success'] = true;
            $resultData['data'] = $data;
        }
        return $resultData;
    }
}