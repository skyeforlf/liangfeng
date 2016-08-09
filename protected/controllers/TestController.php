<?php
/**
 * Created by PhpStorm.
 * User: liangfeng
 * Date: 2016/1/8
 * Time: 13:52
 */



class TestController extends Controller{
	public function actionIndexAjax(){
		$data = array(
			'lf'=>array(
				'name' => '梁峰',
				'age' => '22',
				'sex' => '男',
				'message' => '实习生'
			),
			'fc'=>array(
				'name' => '樊超',
				'age' => '23',
				'sex' => '男',
				'message' => '员工'
			),
		);
		echo json_encode($data);
	}
    public function updateAttribute($item,$value,$stuId){
        $sql = 'update user_attribute set '.$item.'='.$value.' where user_stuid = '.$stuId;
        echo $sql;
    }
	public function actionIndex(){
        //$cookie = Yii::app()->request->getCookies();
        //echo Yii::app()->request->cookies['user_stuid'];
        //echo $cookie['user_stuid']->value;
        //$this->updateAttribute('user_name','梁峰','19212226');
//        $num = '说我是返回就是嗲话饥渴回家啊     说过话腹黑攻啊  十多个返回     /nshdgfhsdgfhasdgfhsadgjajashd/njashghsgh/n';
//        echo str_replace(' ','&nbsp;',str_replace('/n','<br/>',$num));
        print_r($_POST);
	}
	public function actionTest(){
//        $cookieFile = tempnam('./','cookie');
//        $postFields = 'Login_Token1=19212226&Login_Token2=930302&btn=登录';
//		$ch = curl_init();
//		curl_setopt($ch,CURLOPT_URL,'http://ids1.njau.edu.cn:81/amserver/UI/Login?goto=http://my.njau.edu.cn/index.portal&gx_charset=UTF-8');
//		curl_setopt($ch,CURLOPT_HEADER,0);
//        curl_setopt($ch,CURLOPT_RETURNTRANSFER,1);
//        curl_setopt($ch,CURLOPT_PORT,1);
//        curl_setopt($ch,CURLOPT_COOKIEJAR,$cookieFile);
//        curl_setopt($ch,CURLOPT_POSTFIELDS,$postFields);
//        curl_exec($ch);
//        curl_close($ch);

        $ch = curl_init();
        curl_setopt($ch,CURLOPT_URL,'http://my.njau.edu.cn/login.portal');
        curl_setopt($ch,CURLOPT_HEADER,0);
        curl_setopt($ch,CURLOPT_RETURNTRANSFER,0);
//        curl_setopt($ch,CURLOPT_COOKIEFILE,$cookieFile);
        curl_exec($ch);
        curl_close($ch);

//		$response  = curl_exec($ch);
//        die;
//		$match = array();
//		$regix = "/<table cellpadding=\"0\" width=\"100%\" class=\"displayTag\" cellspacing=\"1\" border=\"0\" id=\"user\">[\s\S.*]*<\/table>/";
//		preg_match($regix,$response,$match);
//		echo $match[0];
	}
	public function actionTest1(){
		UserInfoDao::updateUserFaceInfo(array('name'=>'_2304948578374636476.jpg', 'left'=>48, 'top'=>0, 'right'=>235, 'bottom'=>235, 'stuId'=>'19212226'));
	}
	public function get_onlineip() {
		$ch = curl_init('http://www.ip138.com/ip2city.asp');
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
		$a  = curl_exec($ch);
		preg_match('/[(.*)]/', $a, $ip);
		return $ip[0];
	}
}
