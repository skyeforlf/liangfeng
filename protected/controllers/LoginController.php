<?php
/**
 * Created by PhpStorm.
 * User: liangfeng
 * Date: 2016/3/9
 * Time: 15:40
 */
class LoginController extends Controller{
    public static $validate;

    public static $cookie;
    public function init(){
        parent::init();
        self::$validate = Validate::getInstance();
        self::$cookie = Cookie::getInstance();
    }

    /**
     * 登录频道页面
     * @throws CException
     */
    public function actionIndex(){
        $action = Yii::app()->request->getParam('action');
        if($action == 'login'){
            $idNumber = Yii::app()->request->getPost('idNumber');
            $password = Yii::app()->request->getPost('password');
            if(empty($idNumber)||empty($password)){
                $this->redirect(DOMAIN_NAME.'/index.php?r=login/index');
            }
            if(!is_null(self::$validate->validateQQ($idNumber))){
                if(!is_null(self::$validate->validateTelephone($idNumber))){
                    if(!is_null(self::$validate->validateStudentId($idNumber))){
                        $this->redirect(DOMAIN_NAME.'/index.php?r=login/index');
                    }
                }
            }
            $loginFormModel = new LoginFormModel($idNumber, $password);
            $loginData = $loginFormModel->login();
            if($loginData['success']){
                self::$cookie->setCookie(array('user_name','user_stuid','user_qq','user_tel'),
                    array($loginData['data']['user_name'],$loginData['data']['user_stuid'],$loginData['data']['user_qq'],$loginData['data']['user_tel']),
                    time()+86400);
                $this->redirect(DOMAIN_NAME);
            }
        }
        $this->renderPartial('index');
    }
}
