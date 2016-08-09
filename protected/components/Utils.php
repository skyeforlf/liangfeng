<?php
/**
 * Created by PhpStorm.
 * User: liangfeng
 * Date: 16/8/3
 * Time: 15:46
 */
class Utils{

    private static $_instance;

    private function __construct (){}

    public function __clone ()
    {
        // TODO: Implement __clone() method.
        trigger_error("MoileDao not allow clone!",E_USER_ERROR);
    }

    public static function getInstance(){
        if(!(self::$_instance instanceof self)){
            self::$_instance = new self;
        }
    }

    /**
     * 加密密码
     * @param $pwd
     * @param $secretKey
     * @return string
     */
    public static function encodePwd($pwd,$secretKey){
        return sha1($secretKey.md5($pwd));
    }

    /**
     * 返回6位长度的秘钥
     * @return string
     */
    public static function getSecretKey(){
        return substr(uniqid(),0,6);
    }

    /**
     * @param $text
     * @return string
     */
    public static function formatText($text){
        return trim(str_replace(' ','&nbsp;',str_replace('/n','<br/>',$text)));
    }

}
