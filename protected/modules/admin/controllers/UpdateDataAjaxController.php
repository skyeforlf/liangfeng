<?php
/**
 * Created by PhpStorm.
 * User: liangfeng
 * Date: 16/3/30
 * Time: 23:46
 */
class UpdateDataAjaxController extends Controller{
    private $_di = null;

    /**
     * 初始化函数
     */
    public function init(){
        parent::init();

        $this->_di = Di::getInstance();

        $this->_di->setShared('UpdateDataModel', new UpdateDataModel());

        $this->_di->setShared('SelectDataModel', new SelectDataModel());
    }
    public function actionUpdateAttributeDataAjax(){
        $stuId = Yii::app()->request->getPost('stuId');
        if(empty($stuId)){
            return false;
        }
        $item  = Yii::app()->request->getPost('item');
        $item = 'user_'.$item;

        $value = Yii::app()->request->getPost('value');

        $data = $this->_di->get('UpdateDataModel')->updateAttrinbute($item,$value,$stuId);
        if($data == 1){
            echo json_encode(array(
                'success'=>true,
                'data'=>$value
            ));
            exit;
        }
        echo json_encode(array(
            'success'=>false,
            'data'=>0
        ));
        exit;
    }
    public function actionUpdateOtherInfoDataAjax(){
        $stuId = Yii::app()->request->getPost('stuId');
        if(empty($stuId)){
            return false;
        }
        $item  = Yii::app()->request->getPost('item');
        $item = 'user_'.$item;

        $value = Yii::app()->request->getPost('value');

        $data = $this->_di->get('UpdateDataModel')->updateOtherInfo($item,$value,$stuId);
        if($data == 1){
            echo json_encode(array(
                'success'=>true,
                'data'=>$value
            ));
            exit;
        }
        echo json_encode(array(
            'success'=>false,
            'data'=>0
        ));
        exit;
    }

    /**
     * 异步修改学校信息
     * @return bool
     */
    public function actionUpdateSchoolDataAjax(){
        $stuId = Yii::app()->request->getPost('stuId');
        if(empty($stuId)){
            return false;
        }
        $item  = Yii::app()->request->getPost('item');

        $value = Yii::app()->request->getPost('value');

        if($item == 'school_id'){
            $schoolName = $this->_di->get('SelectDataModel')->selectSchoolInfo($value);
        }else{
            $item = 'user_'.$item;
        }

        $data = $this->_di->get('UpdateDataModel')->updateSchoolInfo($item,$value,$stuId);

        if(isset($schoolName)){
            $value = $schoolName['school_name'];
        }
        if($data == 1){
            echo json_encode(array(
                'success'=>true,
                'data'=>$value
            ));
            exit;
        }
        echo json_encode(array(
            'success'=>false,
            'data'=>0
        ));
        exit;
    }
}
