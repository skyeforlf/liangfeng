<?php
/**
 * Created by PhpStorm.
 * User: liangfeng
 * Date: 16/3/30
 * Time: 11:12
 */
class ValitateForm{
    private static $_instance;

    private function __construct(){}

    public function __clone(){
        trigger_error('not allow clone',E_USER_ERROR);
    }

    public static function getInstance(){
        if(!(self::$_instance instanceof self)){
            self::$_instance = new self;
        }
        return self::$_instance;
    }

    /**
     * 验证用户名,姓名,昵称,可中文的帐号信息之类的
     * @param $username
     * @return null|string
     */
    public static function validateUsername($username){

        $result = ['success'=>true,'msg'=>''];

        if(preg_match('/[ !@#$%^&*()_+-<>?]/',$username)){
            $result['success'] = false;
            $result['msg'] = '用户名包含非法字符！';
            return $result;
        }
        if(strlen($username)<2||strlen($username)>40){
            $result['success'] = false;
            $result['msg'] = '用户名小于2位或者大于40位！';
            return $result;
        }
        return $result;
    }

    /**
     * 验证学号  5到20位数字
     * @param $stuid
     * @return null|string
     */
    public static function validateStudentId($stuid){
        if(!preg_match('/[0-9]{5,20}/',$stuid)){
            return '学号格式不正确！';
        }
        return null;
    }

    public static function validateSex($sex){
        $result = ['success'=>true,'msg'=>''];
        $sexArray = ['男','女'];
        if(!in_array($sex,$sexArray)){
            $result['success'] = false;
            $result['msg'] = '据我所知正常性别只分男女!';
            return $result;
        }
        return $result;
    }

    /**
     * 注册密码验证
     * @param $passwordOne 密码
     * @param $passwordTwo 密码验证
     * @param $min  最小长度
     * @param $max  最大长度
     * @return null|string  返回值,应该加密一下
     */
    public static function validatePassword($passwordOne,$passwordTwo,$min,$max){
        $result = ['success'=>true,'msg'=>''];
        if($passwordOne!=$passwordTwo){
            $result['success'] = false;
            $result['msg'] = '密码与确认密码不一致！';
            return $result;
        }
        if(preg_match('/[<>!$%^&*()]/',$passwordOne)){
            $result['success'] = false;
            $result['msg'] = '密码包含非法字符！';
            return $result;
        }
        if(strlen($passwordOne)<$min||strlen($passwordOne)>$max){
            $result['success'] = false;
            $result['msg'] = '用户名小于'.$min.'位或者大于'.$max.'位！';
            return $result;
        }
        return $result;
    }

    /**
     * 验证QQ号
     * @param $qq
     * @return null|string
     */
    public static function validateQQ($qq){
        $result = ['success'=>true,'msg'=>''];
        if(!preg_match('/^[1-9][0-9]{5,9}$/',$qq)){
            $result['success'] = false;
            $result['msg'] = 'QQ号码格式不正确！';
            return $result;
        }
        return $result;
    }

    /**
     * 验证手机号
     * @param $telephone
     * @return null|string
     */
    public static function validateTelephone($telephone){
        $result = ['success'=>true,'msg'=>''];
        if(!preg_match('/^[1][34578]{1}[0-9]{9}$/',$telephone)){
            $result['success'] = false;
            $result['msg'] = '手机号码格式不正确！';
            return $result;
        }
        return $result;
    }

    /**
     * 验证邮箱
     * @param $email
     * @return null|string
     */
    public static function validateEmail($email){
        $result = ['success'=>true,'msg'=>''];
        if(!preg_match("/^([0-9A-Za-z\\-_\\.]+)@([0-9a-z]+\\.[a-z]{2,3}(\\.[a-z]{2})?)$/i",$email)){
            $result['success'] = false;
            $result['msg'] = '邮箱格式不正确！';
            return $result;
        }
        return $result;
    }

    /**
     * 验证数字之类的,比如身高体重
     * @param $num
     * @return null|string
     */
    public static function validateNumber($num){
        if(!preg_match('/(^[1-9]{1}[0-9]{0,})|(^[1-9]{1}[0-9]{0,}.[1-9]{1,}[0-9]{0,})|(0.[1-9]{1,}[0-9]{0,})/',$num)){
            return '数字格式不正确!';
        }
        return null;
    }
}
