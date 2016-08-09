<?php
class RegisterController extends Controller{

	public $registerFormModel;

	public static $validate;
	public static $cookie;

	public function init(){
		parent::init();
		$this->registerFormModel = new RegisterForm();
		self::$validate = Validate::getInstance();
		self::$cookie = Cookie::getInstance();
	}
	public function actionIndex(){
		$action = Yii::app()->request->getParam('action');
		$data['resultMessage'] = array(
			'success' => true,
			'message' => null,
		);
		if($action == 'register'){
			$userInfo = array(
				'username' => Yii::app()->request->getPost('username'),
				'studentId' => Yii::app()->request->getPost('studentId'),
				'password' => Yii::app()->request->getPost('password'),
				'validatePwd' => Yii::app()->request->getPost('validatePwd'),
				'telephone' => Yii::app()->request->getPost('telephone'),
				'qq' => Yii::app()->request->getPost('qq'),
				'email' => Yii::app()->request->getPost('email'),
			);
			if(empty($userInfo['email'])){
				$userInfo['email'] = $userInfo['qq'].'@qq.com';
			}
			$registerMessage = self::$validate->validate($userInfo);

			if(!$registerMessage){
				$this->registerFormModel->init($userInfo);
				$registerResult = $this->registerFormModel->register();
				if($registerResult){
					self::$cookie->setCookie(array('user_name','user_stuid','user_qq','user_tel'),
											 array($userInfo['username'],$userInfo['studentId'],$userInfo['qq'],$userInfo['telephone']),
											 time()+86400);
					$this->redirect(DOMAIN_NAME);
				}
			}else{
				$data['resultMessage'] = array(
					'success' => false,
					'message' => $registerMessage,
				);
			}
		}
		$this->renderPartial('index',$data);
	}
	public function actionValidateUsernameAjax(){
		$userName = Yii::app()->request->getQuery("username");
		$resultInfo = self::$validate->validateUsername($userName);
		$result = array(
			'success' => false,
			'message' => $resultInfo,
		);
		if(is_null($resultInfo)){
			$result['success'] = true;
			echo json_encode($result);
		}else{
			echo json_encode($result);
		}
	}
	public function actionValidateQQAjax(){
		$qq = Yii::app()->request->getQuery("qq");
		$resultInfo = self::$validate->validateQQ($qq);
		$result = array(
			'success' => false,
			'message' => $resultInfo,
		);
		if(is_null($resultInfo)){
			$result['success'] = true;
			echo json_encode($result);
		}else{
			echo json_encode($result);
		}
	}
	public function actionValidateStudentIdAjax(){
		$userName = Yii::app()->request->getQuery("username");
		$resultInfo = self::$validate->validateUsername($userName);
		$result = array(
			'success' => false,
			'message' => $resultInfo,
		);
		if(is_null($resultInfo)){
			$result['success'] = true;
			echo json_encode($result);
		}else{
			echo json_encode($result);
		}
	}
}