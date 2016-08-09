<?php
/**
 * Created by PhpStorm.
 * User: liangfeng
 * Date: 16/8/2
 * Time: 15:35
 */
class MobileController extends Controller{

    public $layout = '/layouts/mobile';

    private $_di = null;

    public function init(){
        parent::init();
        $this->_di = Di::getInstance();
        //注册一个手机模型类
        $this->_di->setShared('MobileModel',function(){
            return new MobileModel();
        });
    }

    public function actionTest(){
        $this->render('test');
    }





    public function actionUserRegister(){

        Yii::app()->clientScript->registerScriptFile(DOMAIN_NAME.'/assets/mobile/js/user-register.js', CClientScript::POS_END);
        $this->render('user-register');
    }


    /**
     * 用户中心界面
     */
    public function actionUserCenter(){

        Yii::app()->clientScript->registerScriptFile(DOMAIN_NAME.'/assets/mobile/js/user-center.js', CClientScript::POS_END);

        $this->render('user-center');
    }

    /**
     * 修改用户信息界面
     */
    public function actionEditUserInfo(){

        $this->render('edit-user-info');
    }

    /**
     * 商品详情页面
     */
    public function actionProductDetail(){

        Yii::app()->clientScript->registerScriptFile(DOMAIN_NAME.'/assets/mobile/js/product-detail.js', CClientScript::POS_END);

        $this->render('product-detail');
    }

    /**
     * 卡片页面
     */
    public function actionCards(){

        $this->render('cards');
    }

    public function actionProductList(){
        $this->render('product-list');
    }















///////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
/////////////////////////////////////////        异步     AJAX        /////////////////////////////////////////
///////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////


    /**
     * 用户异步注册
     */
    public function actionAjaxUserRegister(){

        $params = $_POST;
        $regInfo = $this->_di->get('MobileModel')->userRegister($params);

        //写入Cookie

        unset($regInfo['data']);

        echo json_encode($regInfo);

    }
}