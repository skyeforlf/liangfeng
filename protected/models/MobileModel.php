<?php
/**
 * Created by PhpStorm.
 * User: liangfeng
 * Date: 16/8/3
 * Time: 15:03
 */
class MobileModel{
    public function userRegister($params){

        $result = ['success'=>false,'msg'=>'注册失败','errorCode'=>'20000','data'=>[]];

        //验证用户名是否合理
        $validateName = ValitateForm::validateUsername($params['username']);
        if(!$validateName['success']){
            $result['msg'] = $validateName['msg'];
            $result['errorCode'] = '20002';
            return $result;
        }

        //验证有密码是否正确
        $validatePwd = ValitateForm::validatePassword($params['password'],$params['password'],6,20);
        if(!$validatePwd['success']){
            $result['msg'] = $validatePwd['msg'];
            $result['errorCode'] = '20003';
            return $result;
        }
        $params['password'] = Utils::encodePwd($params['password'],$params['secretKey']);

        //验证电话是否正确
        $validateTel = ValitateForm::validateTelephone($params['tel']);
        if(!$validateTel['success']){
            $result['msg'] = $validateTel['msg'];
            $result['errorCode'] = '20004';
            return $result;
        }

        //验证电话是否正确
        $validateTel = ValitateForm::validateTelephone($params['tel']);
        if(!$validateTel['success']){
            $result['msg'] = $validateTel['msg'];
            $result['errorCode'] = '20004';
            return $result;
        }

        //验证性别是否正确
        $validateSex = ValitateForm::validateSex($params['sex']);
        if(!$validateSex['success']){
            $result['msg'] = $validateSex['msg'];
            $result['errorCode'] = '20005';
            return $result;
        }

        //验证邮件是否正确
        $validateEmial = ValitateForm::validateEmail($params['email']);
        if(!$validateEmial['success']){
            $result['msg'] = $validateEmial['msg'];
            $result['errorCode'] = '20006';
            return $result;
        }



        //验证用户是否存在
        $userInfo = MobileDao::getInstance()->selectUserByTel($params['tel']);
        if($userInfo){
            $result['msg'] = '本手机号已经注册过了';
            $result['errorCode'] = '20001';
            return $result;
        }

        $params['introduction'] = Utils::formatText($params['introduction']);

        $params['secretKey'] = Utils::getSecretKey();//个人秘钥

        $reDate = MobileDao::getInstance()->writeInUserRegInfo($params);

        if($reDate){
            $result = ['success'=>false,'msg'=>'注册失败','errorCode'=>'20000','data'=>[]];
            $result['success'] = true;
            $result['msg'] = '注册成功!';
            $result['errorCode'] = '666666';
            $result['data'] = [['username']=>$params['username'],'tel'=>$params['tel'],'email'=>$params['email'],'sex'=>$params['sex']];
        }

        return $result;
    }
}