<?php

class SiteController extends Controller
{
	/**
	 * Declares class-based actions.
	 */
    private $_di = null;
	public $name = 'liangfeng';
	public $pageTitle = '首页';
    public $pageName = null;
    public $layout = '/layouts/main';
    public function init(){
        parent::init();

        $this->_di = Di::getInstance();

        $this->_di->setShared('UserInfoModel', new UserInfoModel());

        //$this->_di->setShared('SelectDataModel', new SelectDataModel());
    }

    public function actionGetFaceImage(){
        $stuId = Cookie::getCookie('user_stuid');
        if(empty($stuId)){
            return false;
        }
        $weight = Yii::app()->request->getQuery('weight');
        $height = Yii::app()->request->getQuery('height');

        if(empty($weight)||!is_numeric($weight)||$weight<0){
            $weight = 500;
        }
        if(empty($height)||!is_numeric($height)||$height<0){
            $height = 500;
        }
        if($weight!=$height){
            $weight = $height = $weight > $height ? $height : $weight;
        }

        $userFaceInfo = $this->_di->get('UserInfoModel')->getUserFaceInfo($stuId);

        $img = new PictureShear($userFaceInfo['picUrl'],$userFaceInfo['position'],$weight,$height);
        $img->shear();
    }
	public function actionGetCodeImages(){
		$verifiction = new ValidateCode();
		$verifiction->doImg();
	}




















	/**
	 * This is the default 'index' action that is invoked
	 * when an action is not explicitly requested by users.
	 */
	public function actionIndex()
	{
//        $cookieArray = [
//            ['name'=>'name','value'=>'liangfeng'],
//            ['name'=>'age','value'=>'23'],
//            ['name'=>'height','value'=>'175'],
//            ['name'=>'weight','value'=>'60'],
//            ['name'=>'sex','value'=>'男'],
//        ];
//
//        echo $encodeCookie = Cookie::getInstance()->cookieEncode($cookieArray);
//        echo '<br>';
//        var_dump(Cookie::getInstance()->cookieDecode($encodeCookie));

        //Cookie::setCookieByArray($cookieArray);
//        $upLoad = new UpLoadFile($_FILES);
//        $uploadInfo = $upLoad->upLoad();
//        var_dump($uploadInfo);

        $validate = new ValidateCode();
        $validate->doImg();

        session_start();
        echo $_SESSION['ValidateCode'];
        session_destroy();
	}
    public function actionForm(){
        $this->render('form');
    }

    public function actionTest(){
        $mem = new Memcache;
        $mem->connect('127.0.0.1', 11211);
        $mem->set('key1', 'Mike', 0, 60);
        $val = $mem->get('key1');
        if(isset($val))echo "Get key1 value: " . $val ."";
        echo '--';
        exit;
        //Yii::app()->memcache->set('1234','这就是我的第一个memcache程序',30);
        //echo Yii::app()->memcache->get('1234');
    }





















































	/**
	 * This is the action to handle external exceptions.
	 */
	public function actionError()
	{
		if($error=Yii::app()->errorHandler->error)
		{
			if(Yii::app()->request->isAjaxRequest)
				echo $error['message'];
			else{
				print_r($error);
				$this->render('error', $error);
			}
		}
	}

	/**
	 * Displays the contact page
	 */
	public function actionContact()
	{
		$model=new ContactForm;
		if(isset($_POST['ContactForm']))
		{
			$model->attributes=$_POST['ContactForm'];
			if($model->validate())
			{
				$name='=?UTF-8?B?'.base64_encode($model->name).'?=';
				$subject='=?UTF-8?B?'.base64_encode($model->subject).'?=';
				$headers="From: $name <{$model->email}>\r\n".
					"Reply-To: {$model->email}\r\n".
					"MIME-Version: 1.0\r\n".
					"Content-Type: text/plain; charset=UTF-8";

				mail(Yii::app()->params['adminEmail'],$subject,$model->body,$headers);
				Yii::app()->user->setFlash('contact','Thank you for contacting us. We will respond to you as soon as possible.');
				$this->refresh();
			}
		}
		$this->render('contact',array('model'=>$model));
	}

	/**
	 * Displays the login page
	 */
	public function actionLogin()
	{
		$model=new LoginForm;

		// if it is ajax validation request
		if(isset($_POST['ajax']) && $_POST['ajax']==='login-form')
		{
			echo CActiveForm::validate($model);
			Yii::app()->end();
		}

		// collect user input data
		if(isset($_POST['LoginForm']))
		{
			$model->attributes=$_POST['LoginForm'];
			// validate user input and redirect to the previous page if valid
			if($model->validate() && $model->login())
				$this->redirect(Yii::app()->user->returnUrl);
		}
		// display the login form
		$this->render('login',array('model'=>$model));
	}

	/**
	 * Logs out the current user and redirect to homepage.
	 */
	public function actionLogout()
	{
		Yii::app()->user->logout();
		$this->redirect(Yii::app()->homeUrl);
	}
    public function dump($array){
        echo '<pre>';
        print_r($array);
        echo '</pre>';
    }
}