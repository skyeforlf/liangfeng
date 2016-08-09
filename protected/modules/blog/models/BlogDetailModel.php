<?php
/**
 * Created by PhpStorm.
 * User: liangfeng
 * Date: 2016/3/1
 * Time: 12:51
 */
class BlogDetailModel{
    /**
     * 获取Blog详情
     * @param $blogId
     * @return mixed
     */
    public function getBlogDetailById($blogId){
        //获取详情
        $blogBaseInfo =  CacheTools::getMemcacheCom('BlogDetailDao',                            //类名
                                                    'getBlogDetailById',                        //类下的方法名称
                                                    array($blogId),                             //方法的参数列表
                                                    BlogMemCacheKey::BLOG_DETAIL.$blogId,       //缓存的KEY
                                                    array('expire'=>60)                         //缓存的时间
                );
        //获取评论
        $blogBaseInfo['discuss'] = CacheTools::getMemcacheCom(
                                                    'BlogDetailDao',                            //类名
                                                    'getDiscussInfoById',                        //类下的方法名称
                                                     array($blogId),                             //方法的参数列表
                                                     BlogMemCacheKey::BLOG_DISCUSS.$blogId,       //缓存的KEY
                                                     array('expire'=>60)
        );
        $attention = BlogDetailDao::selectAttentionCount($blogId);
        $blogBaseInfo['attentionCount'] = count($attention);

        $blogBaseInfo['blog_datetime'] = FormatDateTime::formatTime($blogBaseInfo['blog_datetime']);
        //格式化评论
        foreach($blogBaseInfo['discuss'] as &$discuss){
            $discuss['dis_date'] = FormatDateTime::formatTime($discuss['dis_date']);
        }
        return $blogBaseInfo;
    }

    /**
     * 异步设置访问量
     * @param $blogId
     */
    public function updatePvAjax($blogId){
        $blogDetialDao = BlogDetailDao::getInstance();
        //获取详情
        $blogBaseInfo =  CacheTools::getMemcacheCom('BlogDetailDao',                            //类名
                                                    'getBlogDetailById',                        //类下的方法名称
                                                    array($blogId),                             //方法的参数列表
                                                    BlogMemCacheKey::BLOG_DETAIL.$blogId,       //缓存的KEY
                                                    array('expire'=>60)                         //缓存的时间
        );
        $time = time();
        if($blogBaseInfo['blog_pvtime']<$time-3600){
            $blogDetialDao::updateBlogDetialById($blogId,
                                                array('blog_pv','blog_pvtime'),
                                                array($blogBaseInfo['blog_pv']+1,$time)
            );
        }
    }

    /**
     * 添加评论
     * @param $blogId
     * @param $stuId
     * @param $contents
     * @return bool|mixed
     */
    public function writeDiscuss($blogId,$stuId,$contents){
        //写入评论
        $disIdInfo = BlogDetailDao::writeDiscuss($blogId,$stuId,$contents);

        $disId = $disIdInfo['last_insert_id()'];
        if(empty($disId)){
            return false;
        }
        //获取刚刚写入的评论信息
        $discuss = BlogDetailDao::getSingleDiscuss($disId);
        //格式化时间
        $discuss['dis_date'] = FormatDateTime::formatTime($discuss['dis_date']);
        return $discuss;
    }

    /**
     * 读写关注信息
     * @param $stuId
     * @param $blogId
     * @return bool
     */
    public function writeAttention($stuId,$blogId){
        //获取关注数据,如果有表示已经关注过了
        $attData = BlogDetailDao::selectAttention($stuId,$blogId);
        if(empty($attData)){
            //写入关注
            $attention = BlogDetailDao::writeAttention($stuId,$blogId);

            if($attention == 1){
                return 1;
            }else{
                return 0;
            }
        }else{
            return $attData;
        }
    }
}
