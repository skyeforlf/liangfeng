<?php
class IndexController extends Controller{
    //布局文件
    public $layout = '/layouts/main';

    private $_di = null;

    /**
     * 初始化函数
     */
    public function init(){
        parent::init();

        $this->_di = Di::getInstance();

        $this->_di->setShared('ResumeModel', new ResumeModel());
    }

	public function actionIndex(){
        $stuId = Cookie::getCookie('user_stuid');
        if(empty($stuId)){
            $this->redirect(DOMAIN_NAME.'/index.php?r=login/index');
        }
        $data = $this->_di->get('ResumeModel')->getPersonInfo($stuId);
        $this->render('index',$data);
	}
}
