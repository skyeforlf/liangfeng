<?php
/**
 * Created by PhpStorm.
 * User: liangfeng
 * Date: 16/3/30
 * Time: 10:39
 */
class UpdateDataModel{
    /**
     * 更新必要信息
     * @param $item
     * @param $value
     * @param $stuId
     * @return bool|mixed
     */
    public function updateAttrinbute($item,$value,$stuId){
        $items = array(
            'user_name',
            'user_tel',
            'user_qq',
            'user_email',
        );
        if(!in_array($item,$items)){
            return false;
        }
        switch($item){
            case 'user_name' : $valitate = ValitateForm::validateUsername($value);break;
            case 'user_tel' : $valitate = ValitateForm::validateTelephone($value);break;
            case 'user_qq' : $valitate = ValitateForm::validateQQ($value);break;
            case 'user_email' : $valitate = ValitateForm::validateEmail($value);break;
            default : $valitate = '非法修改用户信息!';
        }
        if(!is_null($valitate)){
            return false;
        }
        $user = CacheTools::getMemcacheCom('UpdateDataDao',
                                            'selectUserByStuId',
                                            array($stuId),
                                            AdminMemcacheKey::UPDATE_ATTRIBUTE_INFO.$stuId,
                                            array('expire'=>86400)
        );
        if(empty($user)){
            return false;
        }
        return UpdateDataDao::updateAttribute($item,$value,$stuId);
    }

    /**
     * 更新附加信息
     * @param $item
     * @param $value
     * @param $stuId
     * @return bool|mixed
     */
    public function updateOtherInfo($item,$value,$stuId){
        $items = array(
            'user_sex',
            'user_birthday',
            'user_address',
            'user_height',
            'user_weight',
            'user_introduce',
        );
        if(!in_array($item,$items)){
            return false;
        }
        switch($item){
            case 'user_sex' : $valitate = null;break;
            case 'user_birthday' : $valitate = null;break;
            case 'user_address' : $valitate = ValitateForm::validateUsername($value);break;
            case 'user_height' : $valitate = ValitateForm::validateNumber($value);break;
            case 'user_weight' : $valitate = ValitateForm::validateNumber($value);break;
            case 'user_introduce' : $valitate = null; $value = ValitateForm::validateTextarea($value);break;
            default : $valitate = '非法修改操作';
        }
        if(!is_null($valitate)){
            return false;
        }
        $user = CacheTools::getMemcacheCom('UpdateDataDao',
            'selectUserByStuId',
            array($stuId),
            AdminMemcacheKey::UPDATE_ATTRIBUTE_INFO.$stuId,
            array('expire'=>86400)
        );
        if(empty($user)){
            return false;
        }
        return UpdateDataDao::updateOtherInfo($item,$value,$stuId);
    }

    /**
     * 更新校园信息
     * @param $item
     * @param $value
     * @param $stuId
     * @return bool|mixed
     */
    public function updateSchoolInfo($item,$value,$stuId){
        $items = array(
            'user_professional',
            'user_start_school_date',
            'user_graduate_date',
            'school_id',
            'user_inschool_time',
        );
        if(!in_array($item,$items)){
            return false;
        }
        switch($item){
            case 'user_professional' : $valitate = ValitateForm::validateUsername($value);break;
            case 'user_start_school_date' : $valitate = null;break;
            case 'user_graduate_date' : $valitate = null;break;
            case 'school_id' : $valitate = null;break;
            case 'user_inschool_time' : $valitate = null;break;
            default : $valitate = '非法修改操作';
        }
        if(!is_null($valitate)){
            return false;
        }
        $user = CacheTools::getMemcacheCom('UpdateDataDao',
            'selectUserByStuId',
            array($stuId),
            AdminMemcacheKey::UPDATE_ATTRIBUTE_INFO.$stuId,
            array('expire'=>86400)
        );
        if(empty($user)){
            return false;
        }
        return UpdateDataDao::updateSchoolInfo($item,$value,$stuId);
    }

    public function updateExperience($data){

        //验证部分  先实现功能验证不分省去

        return UpdateDataDao::updateExperience($data);
    }
}
