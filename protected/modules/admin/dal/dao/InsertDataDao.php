<?php
/**
 * Created by PhpStorm.
 * User: liangfeng
 * Date: 16/4/3
 * Time: 00:35
 */
class InsertDataDao{
    private static $_instance;
    private function __construct(){}
    public function __clone()
    {
        // TODO: Implement __clone() method.
    }
    public static function getInstance(){
        if(!(self::$_instance instanceof self)){
            self::$_instance = new self;
        }
        return self::$_instance;
    }

    /**
     * 插入额外信息,一些辅助信息
     * @param $infoArray
     * @return mixed
     */
    public static function InsertOtherInfo($infoArray){
        $sql = 'INSERT INTO user_otherinfo (
                                            user_stuid,
                                            user_facepic,
                                            user_sex,
                                            user_birthday,
                                            user_height,
                                            user_weight,
                                            user_introduce
                                            ) VALUES (
                                            :user_stuid,
                                            :user_facepic,
                                            :user_sex,
                                            :user_birthday,
                                            :user_height,
                                            :user_weight,
                                            :user_introduce
                                            )';
        $command = Yii::app()->db->createCommand($sql);
        $command->bindParam(':user_stuid',$infoArray['user_stuid'],PDO::PARAM_STR);
        $command->bindParam(':user_facepic',$infoArray['user_facepic'],PDO::PARAM_STR);
        $command->bindParam(':user_sex',$infoArray['user_sex'],PDO::PARAM_STR);
        $command->bindParam(':user_birthday',$infoArray['user_birthday'],PDO::PARAM_STR);
        $command->bindParam(':user_height',$infoArray['user_height'],PDO::PARAM_STR);
        $command->bindParam(':user_weight',$infoArray['user_weight'],PDO::PARAM_STR);
        $command->bindParam(':user_introduce',$infoArray['user_introduce'],PDO::PARAM_STR);

        return $command->execute();
    }

    /**
     * 插入学校信息
     * @param $infoArray
     * @return mixed
     */
    public static function InsertSchoolInfo($infoArray){
        $sql = 'INSERT INTO user_schoolinfo (
                                            user_stuid,
                                            user_professional,
                                            user_start_school_date,
                                            user_graduate_date,
                                            school_id,
                                            user_inschool_time
                                            ) VALUES (
                                            :user_stuid,
                                            :user_professional,
                                            :user_start_school_date,
                                            :user_graduate_date,
                                            :school_id,
                                            :user_inschool_time
                                            )';
        $command = Yii::app()->db->createCommand($sql);
        $command->bindParam(':user_stuid',$infoArray['user_stuid'],PDO::PARAM_STR);
        $command->bindParam(':user_professional',$infoArray['user_professional'],PDO::PARAM_STR);
        $command->bindParam(':user_start_school_date',$infoArray['user_start_school_date'],PDO::PARAM_STR);
        $command->bindParam(':user_graduate_date',$infoArray['user_graduate_date'],PDO::PARAM_STR);
        $command->bindParam(':school_id',$infoArray['school_id'],PDO::PARAM_STR);
        $command->bindParam(':user_inschool_time',$infoArray['user_inschool_time'],PDO::PARAM_STR);

        return $command->execute();
    }
    /**
     * 插入学校信息
     * @param $infoArray
     * @return mixed
     */
    public static function InsertLanguageInfo($infoArray){
        $sql = 'INSERT INTO user_language (
                                            user_stuid,
                                            user_language,
                                            user_degree
                                            ) VALUES (
                                            :user_stuid,
                                            :user_language,
                                            :user_degree
                                            )';
        $command = Yii::app()->db->createCommand($sql);
        $command->bindParam(':user_stuid',$infoArray['user_stuid'],PDO::PARAM_STR);
        $command->bindParam(':user_language',$infoArray['user_language'],PDO::PARAM_STR);
        $command->bindParam(':user_degree',$infoArray['user_degree'],PDO::PARAM_STR);

        return $command->execute();
    }

    /**
     * 插入经历
     * @param $expInfo
     * @return mixed
     */
    public static function insertExperienceInfo($expInfo){
        $sql = 'INSERT INTO user_experience (
                                            exp_stuid,
                                            exp_title,
                                            exp_place,
                                            exp_time,
                                            exp_content
                                            ) VALUES (
                                            :stuId,
                                            :title,
                                            :place,
                                            :expTime,
                                            :content
                                            )';
        $command = Yii::app()->db->createCommand($sql);
        $command->bindParam(':stuId',$expInfo['stuId'],PDO::PARAM_STR);
        $command->bindParam(':title',$expInfo['title'],PDO::PARAM_STR);
        $command->bindParam(':place',$expInfo['place'],PDO::PARAM_STR);
        $command->bindParam(':expTime',$expInfo['time'],PDO::PARAM_STR);
        $command->bindParam(':content',$expInfo['content'],PDO::PARAM_STR);
        return $command->execute();
    }

    /**
     * @param $blogInfo
     * @return mixed
     */
    public static function insertBlogInfo($blogInfo){
        $sql = 'INSERT INTO blog_detail (
                                            blog_title,
                                            blog_picurl,
                                            blog_contents,
                                            blog_datetime,
                                            blog_userid,
                                            blog_auther
                                            ) VALUES (
                                            :title,
                                            :picUrl,
                                            :content,
                                             now(),
                                            :stuId,
                                            :auther
                                            )';

        $command = Yii::app()->db->createCommand($sql);

        $command->bindParam(':title',$blogInfo['title'],PDO::PARAM_STR);
        $command->bindParam(':picUrl',$blogInfo['picUrl'],PDO::PARAM_STR);
        $command->bindParam(':content',$blogInfo['content'],PDO::PARAM_STR);
        $command->bindParam(':stuId',$blogInfo['stuId'],PDO::PARAM_STR);
        $command->bindParam(':auther',$blogInfo['auther'],PDO::PARAM_STR);

        return $command->execute();
    }
}