<?php
class IndexController extends Controller{

	public $layout = '/layouts/main';

    private $_di;

    public function init(){
        parent::init();

        $this->_di = Di::getInstance();

        $this->_di->setShared('SelectDataModel',new SelectDataModel());

        $this->_di->setShared('InsertDataModel',new InsertDataModel());
    }

    /**
     * 个人中心主页
     */
    public function actionIndex(){
        $stuId = Cookie::getCookie('user_stuid');

        if(empty($stuId)){
            $this->redirect(DOMAIN_NAME.'/index.php?r=login/index');
        }

        $this->redirect(DOMAIN_NAME.'/index.php?r=admin/UpdateData/Attribute');
        $this->render('index');
	}

    /**
     * 订餐列表
     */
    public function actionOrderList(){
        $stuId = Cookie::getCookie('user_stuid');

        if(empty($stuId)){
            $this->redirect(DOMAIN_NAME.'/index.php?r=login/index');
        }
        $ordersInfo = $this->_di->get('SelectDataModel')->selectOrderInfo($stuId);

        $this->render('orderList',array('ordersInfo' => $ordersInfo));

    }

    /**
     * 添加博客
     */
    public function actionAddBlog(){
        $stuId = Cookie::getCookie('user_stuid');

        if(empty($stuId)){
            $this->redirect(DOMAIN_NAME.'/index.php?r=login/index');
        }
        $isAddBlog = Yii::app()->request->getPost('isAddBlog');
        if(isset($isAddBlog)&&$isAddBlog == 1){
            $filename = $_FILES['blog-file'];
            $uploadFile = new FileUpLoad($_FILES['blog-file'],'./blogpics');
            $uploadMessage = $uploadFile->upLoad();
            if($uploadMessage['errorMess'][0]=='上传成功'){
                $blogInfo = array(
                    'stuId' => $stuId,
                    'auther' => Cookie::getCookie('user_name'),
                    'picUrl' => '/blogpics/'.$uploadMessage['memoryName'][0],
                    'title' => Yii::app()->request->getPost('title'),
                    'content' => Yii::app()->request->getPost('content')
                );
                $result = $this->_di->get('InsertDataModel')->insertBlogInfo($blogInfo);
                if($result){

                }else{

                }
            }
        }
        $this->render('addBlog');
    }

    /**
     * 添加经历
     */
    public function actionAddExperience(){
        $stuId = Cookie::getCookie('user_stuid');
        if(empty($stuId)){
            $this->redirect(DOMAIN_NAME.'/index.php?r=login/index');
        }
        $this->render('addExperience');
    }
    /**
     * 添加经历
     */
    public function actionExperienceList(){
        //获取用户登录信息
        $stuId = Cookie::getCookie('user_stuid');
        if(empty($stuId)){
            $this->redirect(DOMAIN_NAME.'/index.php?r=login/index');
        }

        //获取是否是添加经历
        $isAddExperience = Yii::app()->request->getPost('isAddExperience');

        //获取是否是修改经历
        $isAlterExperience = Yii::app()->request->getPost('isAlterExperience');

        //非空的时候进行插入
        if(!empty($isAddExperience)){
            $expInfo = array(
                'stuId' => $stuId,
                'title' => Yii::app()->request->getPost('title'),
                'place' => Yii::app()->request->getPost('place'),
                'time' => Yii::app()->request->getPost('time'),
                'content' => Yii::app()->request->getPost('content')
            );
            $result = $this->_di->get('InsertDataModel')->insertExperienceInfo($expInfo);
            if($result){
                $this->redirect(DOMAIN_NAME.'/index.php?r=admin/index/experienceList');
            }else{
                /**
                 * errorInfo = array(
                 *   1 == 添加失败
                 *   2 == 可扩展错误
                 * );
                 */
                $this->redirect(DOMAIN_NAME.'/index.php?r=admin/index/addExperience&errorInfo=1');
            }
        }

        //获取经历列表信息
        $experienceInfo = $this->_di->get('SelectDataModel')->selectExperienceInfo($stuId);

        $this->render('experienceList',array('exp' => $experienceInfo));
    }

    /**
     * 异步获取经历详情
     * @return bool
     */
    public function actionGetSingleExperienceAjax(){
        //获取参数
        $stuId = Yii::app()->request->getPost('stuId');
        $expId = Yii::app()->request->getPost('expId');
        //参数判定
        if(empty($stuId)||empty($expId)){
            return false;
        }
        //获取数据
        $expInfo = $this->_di->get('SelectDataModel')->selectExperienceInfo($stuId,$expId);
        echo json_encode(array('success'=>true,'data'=>$expInfo[0]));
        exit();
    }
}
