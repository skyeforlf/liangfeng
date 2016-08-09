<?php
/**
 * Created by PhpStorm.
 * User: liangfeng
 * Date: 16/4/6
 * Time: 18:53
 */
class AjaxDataController extends Controller{
    /**
     * 上传头像的Ajax方法
     */
    private $_di = null;

    public function init(){
        parent::init();

        $this->_di = Di::getInstance();

        $this->_di->setShared('UserInfoModel', new UserInfoModel());

        //$this->_di->setShared('SelectDataModel', new SelectDataModel());
    }
    public function actionUploadFace(){

        $stuId = Cookie::getCookie('user_stuid');

        $left  = Yii::app()->request->getPost('x1');
        $top  = Yii::app()->request->getPost('y1');
        $right  = Yii::app()->request->getPost('x2');
        $bottom  = Yii::app()->request->getPost('y2');

        $name = array($stuId.date('YmdHis',time()));

        $uploadFile = new FileUpLoad($_FILES['upload-face'],'./images/face',$name);

        $uploadMessage = $uploadFile->upLoad();

        if($uploadMessage['errorMess'][0]=='上传成功'){
            $reNum = UserInfoDao::updateUserFaceInfo(array('name'=>'_'.$uploadMessage['memoryName'][0], 'left'=>$left, 'top'=>$top, 'right'=>$right, 'bottom'=>$bottom, 'stuId'=>$stuId));
            if($reNum == 1){
                $userFaceInfo = $this->_di->get('UserInfoModel')->getUserFaceInfo($stuId);
                if(file_exists('./images/face/'.$stuId.'face.jpg')){
                    @unlink('./images/face/'.$stuId.'face.jpg');
                }
                $img = new PictureShear($userFaceInfo['picUrl'],$userFaceInfo['position'],500,500);
                $img->setAttribute('_facePath','./images/face/'.$stuId.'face.jpg');
                $img->shear();
                UserInfoDao::updateUserFaceInfo(array('name'=>'./images/face/'.$stuId.'face.jpg', 'left'=>$left, 'top'=>$top, 'right'=>$right, 'bottom'=>$bottom, 'stuId'=>$stuId));
                echo json_encode(array('success'=>true,'imgUrl'=>'./images/face/'.$stuId.'face.jpg'));
                exit;
            }
        }
        echo json_encode(array('success'=>false));
        exit;
    }
}