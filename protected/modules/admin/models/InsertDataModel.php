<?php
/**
 * Created by PhpStorm.
 * User: liangfeng
 * Date: 16/4/3
 * Time: 00:33
 */
class InsertDataModel{
    /**
     * 额外信息,插入
     * @param $infoArray
     * @return bool
     */
    public function InsertOtherInfo($infoArray){
        if(empty($infoArray['user_stuid'])){
            return false;
        }
        InsertDataDao::InsertOtherInfo($infoArray);
    }

    /**
     * 插入学校信息
     * @param $infoArray
     * @return bool
     */
    public function InsertSchoolInfo($infoArray){
        if(empty($infoArray['user_stuid'])){
            return false;
        }
        InsertDataDao::InsertSchoolInfo($infoArray);
    }

    /**
     * 插入学校信息
     * @param $infoArray
     * @return bool
     */
    public function InsertLanguageInfo($infoArray){
        if(empty($infoArray['user_stuid'])){
            return false;
        }
        return InsertDataDao::InsertLanguageInfo($infoArray);
    }

    /**
     * 插入经历信息
     * @param $expInfo
     */
    public function insertExperienceInfo($expInfo){
        //数据过滤
        return InsertDataDao::insertExperienceInfo($expInfo);
    }

    public function insertBlogInfo($blogInfo){
        //数据过滤
        return InsertDataDao::insertBlogInfo($blogInfo);
    }
}