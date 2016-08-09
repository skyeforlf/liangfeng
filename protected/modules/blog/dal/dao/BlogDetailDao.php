<?php
/**
 * Created by PhpStorm.
 * User: liangfeng
 * Date: 2016/3/1
 * Time: 12:44
 */
class BlogDetailDao{
    private static $_instance;
    private function __construct()
    {
    }
    private function __clone()
    {
        // TODO: Implement __clone() method.
    }

    /**
     * 获取单列模式的对象
     * @return BlogDetailDao
     */
    public static function getInstance(){
        if(!(self::$_instance instanceof self)){
            self::$_instance = new self;
        }
        return self::$_instance;
    }

    /**
     * 获取所有blog详情以浏览量的倒序
     * @return mixed
     */
    public static function getBlogDetail($paxuKey,$flag = false){
        if($flag){
            $sql = 'select * from blog_detail ORDER BY '.$paxuKey;
        }else{
            $sql = 'select * from blog_detail ORDER BY '.$paxuKey.' DESC';
        }

        $command = Yii::app()->db->createCommand($sql);
        return $command->queryAll();
    }

    /**
     * 获取bolg详情通过blogId
     * @param $blogId
     * @return mixed
     */
    public static function getBlogDetailById($blogId){
        $sql = 'select * from blog_detail where blog_id = :blogId';
        $command = Yii::app()->db->createCommand($sql);
        $command->bindParam(':blogId',$blogId,PDO::PARAM_INT);
        return $command->queryRow();
    }
    /**
     * 获取bolg详情通过学号
     * @param $blogId
     * @return mixed
     */
    public static function getBlogDetailByStuId($stuId){
        $sql = 'select * from blog_detail where blog_userid = :stuId';
        $command = Yii::app()->db->createCommand($sql);
        $command->bindParam(':stuId',$stuId,PDO::PARAM_INT);
        return $command->queryAll();
    }

    /**
     * 获取blog的评论通过blogId
     * @param $blogId
     * @return mixed
     */
    public static function getDiscussInfoById($blogId){
        $sql = 'select * from blog_user_discuss where blog_id = :blogId';
        $command = Yii::app()->db->createCommand($sql);
        $command->bindParam(':blogId',$blogId,PDO::PARAM_INT);
        return $command->queryAll();
    }

    /**
     * 获取单个评论信息
     * @param $disId
     * @return mixed
     */
    public static function getSingleDiscuss($disId){
        $sql = 'select * from blog_user_discuss where dis_id = :disId';
        $command = Yii::app()->db->createCommand($sql);
        $command->bindParam(':disId',$disId,PDO::PARAM_INT);
        return $command->queryRow();
    }
    /**
     * 更新blog详情通过BlogId
     * @param $blogId
     * @param $item
     * @param $param
     */
    public static function updateBlogDetialById($blogId,$item,$param){
        if(is_array($item)){
            $sql = 'update blog_detail set ';
            foreach($item as $key => $value){
                $sql .= $value.'='.$param[$key].',';
            }
            $sql = substr($sql,0,strlen($sql)-1);
            $sql .= ' where blog_id = '.$blogId;
        }else{
            $sql = 'update blog_detail set '.$item.'='.$param.' where blog_id = '.$blogId;
        }
        $command = Yii::app()->db->createCommand($sql);
        $command->execute();
    }

    /**
     * 添加bolg评论
     * @param $blogId
     * @param $stuId
     * @param $contents
     * @return mixed
     */
    public static function writeDiscuss($blogId,$stuId,$contents){
        $sql = 'INSERT INTO blog_dis (
                            blog_id,
                            user_stuid,
                            dis_contents,
                            dis_date)
                            VALUES (
                            :blogId,
                            :stuId,
                            :contents,
                            now()
                )';
        $command = Yii::app()->db->createCommand($sql);
        $command->bindParam(':blogId',$blogId,PDO::PARAM_INT);
        $command->bindParam(':stuId',$stuId,PDO::PARAM_INT);
        $command->bindParam(':contents',$contents,PDO::PARAM_INT);
        $command->execute();
        $sql = 'SELECT last_insert_id()';
        $commandId = Yii::app()->db->createCommand($sql);
        return $commandId->queryRow();
    }
    /**
     * 添加关注
     */
    public static function writeAttention($stuId,$blogId){
        $sql = 'INSERT INTO blog_attention (
                            user_stuid,
                            blog_id
                            )
                            VALUES (
                            :stuId,
                            :blogId
                )';
        $command = Yii::app()->db->createCommand($sql);
        $command->bindParam(':stuId',$stuId,PDO::PARAM_STR);
        $command->bindParam(':blogId',$blogId,PDO::PARAM_INT);
        return $command->execute();
    }
    public static function selectAttention($stuId,$blogId){
        $sql = 'select * from blog_attention where user_stuid = '.$stuId.' and blog_id = '.$blogId;
        $command = Yii::app()->db->createCommand($sql);
        return $command->queryRow();
    }
    public static function selectAttentionCount($blogId){
        $sql = 'select blog_id from blog_attention where blog_id = '.$blogId;
        $command = Yii::app()->db->createCommand($sql);
        return $command->queryAll();
    }
}
