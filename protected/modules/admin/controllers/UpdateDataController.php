<?php
/**
 * Created by PhpStorm.
 * User: liangfeng
 * Date: 16/3/30
 * Time: 00:02
 */
class UpdateDataController extends Controller{

    public $layout = '/layouts/main';

    private $_di = null;

    /**
     * 初始化函数
     */
    public function init(){
        parent::init();

        $this->_di = Di::getInstance();

        $this->_di->setShared('SelectDataModel', new SelectDataModel());

        $this->_di->setShared('InsertDataModel', new InsertDataModel());

        $this->_di->setShared('UpdateDataModel', new UpdateDataModel());
    }

    /**
     * 基础信息处理与修改
     */
    public function actionAttribute(){
        $stuId = Cookie::getCookie('user_stuid');
        //没有用户cookie跳转首页
        if(empty($stuId)){
            $this->redirect(DOMAIN_NAME.'/index.php?r=login/index');
        }
        //获取用户数据
        $attribute = $this->_di->get('SelectDataModel')->selectAttributeByStuId($stuId);

        if(empty($attribute)){
            $this->redirect(DOMAIN_NAME.'/index.php?r=login/index');
        }

        $this->render('attribute',$attribute);
    }

    /**
     * 额外信息处理
     */
    public function actionOtherInfo(){
        $stuId = Cookie::getCookie('user_stuid');
        //没有用户cookie跳转首页
        if(empty($stuId)){
            $this->redirect(DOMAIN_NAME.'/index.php?r=login/index');
        }
        //获取用户数据
        $otherInfo = $this->_di->get('SelectDataModel')->selectOtherInfoByStuId($stuId);

        if(!$otherInfo){
            $otherInfo['user_stuid'] = Cookie::getCookie('user_stuid');
            $otherInfo['user_facepic'] = '/images/default-face.jpg';
            $otherInfo['user_sex'] = '未知?';
            $otherInfo['user_birthday'] = date('Y-m-d',time());
            $otherInfo['user_height'] = '未知?';
            $otherInfo['user_weight'] = '未知?';
            $otherInfo['user_address'] = '未知?';
            $otherInfo['user_introduce'] = '';
            $this->_di->get('InsertDataModel')->InsertOtherInfo($otherInfo);
        }
        $otherInfo['user_introduce'] = trim($otherInfo['user_introduce']);
        $this->render('otherInfo',$otherInfo);
    }

    /**
     * 学校和语言信息的操作页面
     */
    public function actionSchAndLang(){
        $stuId = Cookie::getCookie('user_stuid');
        //没有用户cookie跳转首页
        if(empty($stuId)){
            $this->redirect(DOMAIN_NAME.'/index.php?r=login/index');
        }
        //获取用户数据
        $schAndLang = $this->_di->get('SelectDataModel')->selectSchAndLangByStuId($stuId);
        if(empty($schAndLang['school'])){
            $school['user_stuid'] = Cookie::getCookie('user_stuid');
            $school['user_professional'] = '未填写专业名称';
            $school['user_start_school_date'] = date('Y-m-d',time());
            $school['user_graduate_date'] = date('Y-m-d',time());
            $school['school_id'] = 1;
            $school['user_inschool_time'] = '四年制';
            $this->_di->get('InsertDataModel')->InsertSchoolInfo($school);
            $schAndLang['school'] = $school;
        }
        if(empty($schAndLang['language'])){
            $language['user_stuid'] = Cookie::getCookie('user_stuid');
            $language['user_language'] = '语言名称';
            $language['user_degree'] = '熟练程度';
            $schAndLang['school'] = $language;
        }
        $this->render('schAndLang',$schAndLang);
    }

    public function actionExperience(){
        $stuId = Cookie::getCookie('user_stuid');
        //没有用户cookie跳转首页
        if(empty($stuId)){
            $this->redirect(DOMAIN_NAME.'/index.php?r=login/index');
        }

        $expInfo = array(
            'expId' => Yii::app()->request->getPost('expId'),
            'stuId' => $stuId,
            'title' => Yii::app()->request->getPost('title'),
            'place' => Yii::app()->request->getPost('place'),
            'time' => Yii::app()->request->getPost('time'),
            'content' => Yii::app()->request->getPost('content')
        );

        $result = $this->_di->get('UpdateDataModel')->updateExperience($expInfo);
        //现在的逻辑是只要不出现500错误都是跳转经历列表也
        $this->redirect(DOMAIN_NAME.'/index.php?r=admin/index/experienceList&refreshFileCache=1');
    }
}
