<?php
/**
 * Created by PhpStorm.
 * User: liangfeng
 * Date: 16/3/29
 * Time: 23:27
 */
class AdminNavWidget extends CWidget{
    public $userData;
    public function ini(){

    }
    public function run(){
        $selectModel = new SelectDataModel();
        $this->userData = $selectModel->selectUserInfo(Cookie::getCookie('user_stuid'));
        $this->render('adminNav',$this->userData);
    }
}
