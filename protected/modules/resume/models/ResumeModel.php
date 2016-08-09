<?php
/**
 * Created by PhpStorm.
 * User: liangfeng
 * Date: 16/3/28
 * Time: 12:49
 */
class ResumeModel{
    /**
     * 基本信息
     * @param $stuId
     * @return mixed
     */
    public function getUserAttribute($stuId){
        $attribute = ResumeDao::getUserAttribute($stuId);
        $returnDate['id'] = $attribute['user_id'];
        $returnDate['name'] = $attribute['user_name'];
        $returnDate['contact']['tel'] = $attribute['user_tel'];
        $returnDate['contact']['qq'] = $attribute['user_qq'];
        $returnDate['contact']['email'] = $attribute['user_email'];
        return $returnDate;
    }

    /**
     * 其他信息
     * @param $stuId
     * @return mixed
     */
    public function getUserOtherInfo($stuId){
        $otherInfo = ResumeDao::getUserOtherInfo($stuId);
        if(empty($otherInfo)){
            return array(
                'user_facepic'=>'/images/default-face.jpg',
                'user_sex'=>'未知',
                'user_birthday'=>'未知',
                'user_height'=>'未知',
                'user_weight'=>'未知',
                'user_introduce'=>'暂无自我介绍',
            );
        }
        return $otherInfo;
    }

    /**
     * 获取有关学校的信息
     * @param $stuId
     * @return array|bool|null
     */
    public function getUserSchoolInfo($stuId){
        $mySchool =  ResumeDao::getUserSchoolInfo($stuId);
        if(empty($mySchool)){
            return null;
        }
        $school = ResumeDao::getSchool($mySchool['school_id']);
        if(empty($school)){
            return false;
        }
        return array_merge($mySchool,$school);
    }

    /**
     * 获取技能信息
     * @param $stuId
     * @return mixed
     */
    public function getUserSkill($stuId){
        //最多获取三个主要的技能
        return array_slice(ResumeDao::getUserSkill($stuId),0,3);
    }

    /**
     * 获取语言
     * @param $stuId
     * @return array
     */
    public function getUserLanguage($stuId){
        //最多获取四个语言有关的
        return array_slice(ResumeDao::getUserLanguage($stuId),0,4);
    }
    /**
     * 获取经历
     * @param $stuId
     * @return array
     */
    public function getExperienceInfo($stuId){
        //最多获取四个语言有关的
        return ResumeDao::getExperienceInfo($stuId);
    }



    public function getPersonInfo($stuId){
        $attribute = CacheTools::getMemcacheCom($this,
                                                'getUserAttribute',
                                                 array($stuId),
                                                 MemcacheKey::RESUME_ATTRIBUTE.$stuId,
                                                 array('expire'=>86400)
        );
        $otherInfo = CacheTools::getMemcacheCom($this,
                                                'getUserOtherInfo',
                                                 array($stuId),
                                                 MemcacheKey::RESUME_OTHERINFO.$stuId,
                                                 array('expire'=>86400)
        );

        $attribute['contact']['address'] = $otherInfo['user_address'];

        $schoolInfo = CacheTools::getMemcacheCom($this,
                                                'getUserSchoolInfo',
                                                 array($stuId),
                                                 MemcacheKey::RESUME_SCHOOLINFO.$stuId,
                                                 array('expire'=>86400)
        );
        $skill = CacheTools::getMemcacheCom($this,
                                            'getUserSkill',
                                             array($stuId),
                                             MemcacheKey::RESUME_SKILL.$stuId,
                                             array('expire'=>86400)
        );
        $language = CacheTools::getMemcacheCom($this,
                                            'getUserLanguage',
                                             array($stuId),
                                             MemcacheKey::RESUME_LANGUAGE.$stuId,
                                             array('expire'=>86400)
        );
        $experience = CacheTools::getMemcacheCom($this,
                                            'getExperienceInfo',
                                            array($stuId),
                                            MemcacheKey::RESUME_EXPERIENCE.$stuId,
                                            array('expire'=>86400)
        );
        $userInfo = array_merge($attribute,$otherInfo);
        $userInfo['schoolInfo'] = $schoolInfo;
        $userInfo['skill'] = $skill;
        $userInfo['language'] = $language;
        $userInfo['experience'] = $experience;
        return $userInfo;
    }
}
