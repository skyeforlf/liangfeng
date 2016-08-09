<?php
/**
 * Created by PhpStorm.
 * User: liangfeng
 * Date: 2016/3/9
 * Time: 15:03
 */
class Cookie{
    //单列私有变量
    private static $_instance;
    //cookie进行编码的时候用到的key
    private $_key = 'Encode::Cookie::Key::2016';

    //单列私有构造方法
    private function __construct(){}

    /**
     * 获取单列私有变量方法
     * @return Cookie
     */
    public static function getInstance(){
        if(!(self::$_instance instanceof self)){
            self::$_instance = new self;
        }
        return self::$_instance;
    }
    //不允许clone
    public function __clone()
    {
        // TODO: Implement __clone() method.
        trigger_error('Clone is not allow!',E_USER_ERROR);
    }

    public static function setCookie($name, $value, $expire=false){
        if(is_array($name)){
            $i = 0;
            foreach($name as $item){
                if(!isset($value[$i])||empty($value[$i])){
                    $value[$i] = 'Not defined';
                }
                $cookieClass = new CHttpCookie($item, $value[$i]);
                if(is_array($expire) && $expire[$i]){
                    $cookieClass->expire = $expire[$i];
                }elseif($expire){
                    $cookieClass->expire = $expire;
                }
                Yii::app()->request->cookies[$item]=$cookieClass;
                $i++;
            }
        }else{
            $cookieClass = new CHttpCookie($name, $value);
            if($expire){
                $cookieClass->expire = $expire;
            }
            Yii::app()->request->cookies[$name]=$cookieClass;
        }
    }

    /**
     * 设置Cookie通过数组传参
     * @param $cookieArr
     *
     * ['name'=>'必填','value'=>'必填','expire'=>'可选']
     *
     */
    public static function setCookieByArray($cookieArr){
        //cookie的保存时间默认是一天
        $expire = time()+60*60*24;
        //循环进行Cookie设置
        foreach($cookieArr as $item){
            if( !empty($item['name']) && !empty($item['value']) ){
                $cookieClass = new CHttpCookie($item['name'], $item['value']);
                $cookieClass->expire = empty($item['expire']) ? $expire : $item['expire'];
                Yii::app()->request->cookies[$item['name']]=$cookieClass;
            }
        }
    }

    /**
     * cookie编码  这只是简单的编码  以后有什么复杂的编码可以进行扩展
     * @param $cookieArr
     * @return string
     */
    public function cookieEncode($cookieArr){
        return base64_encode(md5($this->_key).base64_encode(json_encode($cookieArr)));
    }

    /**
     * cookie解码  这个是与cookie编码进行反向的,编码的时候不要用不可逆的编码形式
     * @param $cookieArr
     * @return mixed
     */
    public function cookieDecode($cookieStr){
        $cookieStr = base64_decode($cookieStr);
        if(strpos($cookieStr,md5($this->_key))==0){
            $cookieStr = substr($cookieStr,32);
            return json_decode(base64_decode($cookieStr),true);
        }
        return false;
    }

    /**
     * 获取Cookie的值
     * @param $name
     * @return mixed
     */
    public static function getCookie($name){
        return Yii::app()->request->cookies[$name];
    }

    /**
     * 删除Cookie
     * @param $name
     */
    public static function delCookie($name){
        $cookie = Yii::app()->request->getCookies();
        unset($cookie[$name]);
    }
}
