<?php
/**
 * Created by PhpStorm.
 * User: liangfeng
 * Date: 16/3/16
 * Time: 13:30
 */
class BlogIndexModel{
    public function getPvBlog($num){
        $pvBlogInfo = BlogDetailDao::getBlogDetail('blog_pv');
        if(count($pvBlogInfo)>$num){
            $pvBlogInfo = array_slice($pvBlogInfo,0,$num);
        }
        foreach($pvBlogInfo as &$item){
            $item['discuss'] = BlogDetailDao::getDiscussInfoById($item['blog_id']);
            $item['userInfo'] = UserInfoDao::getUserFixedInfoByStuid($item['blog_userid']);
        }
        return $pvBlogInfo;
    }
    public function getAttentionBlog($num){
        $pvBlogInfo = BlogDetailDao::getBlogDetail('blog_attention');
        if(count($pvBlogInfo)>$num){
            $pvBlogInfo = array_slice($pvBlogInfo,0,$num);
        }
        return $pvBlogInfo;
    }
    public function getNewBlog($num){
        $pvBlogInfo = BlogDetailDao::getBlogDetail('blog_datetime',false);
        if(count($pvBlogInfo)>$num){
            $pvBlogInfo = array_slice($pvBlogInfo,0,$num);
        }
        return $pvBlogInfo;
    }
    public function getIndexBlogDetail(){

        $blogIndex['pv'] = CacheTools::getMemcacheCom($this,
                                                    'getPvBlog',
                                                     array(2),
                                                     BlogMemCacheKey::Blog_PV_DETAIL,
                                                     array('expire'=>86400));
        foreach($blogIndex['pv'] as &$item){
            $item['blog_datetime'] = FormatDateTime::formatTime($item['blog_datetime']);
        }

        $blogIndex['attention'] = CacheTools::getMemcacheCom($this,
                                                    'getAttentionBlog',
                                                     array(3),
                                                     BlogMemCacheKey::Blog_ATTENTION_DETAIL,
                                                     array('expire'=>86400));
        foreach($blogIndex['attention'] as &$item){
            $item['blog_datetime'] = FormatDateTime::formatTime($item['blog_datetime']);
        }

        $blogIndex['new'] = CacheTools::getMemcacheCom($this,
                                                    'getNewBlog',
                                                     array(4),
                                                     BlogMemCacheKey::Blog_NEW_DETAIL,
                                                     array('expire'=>86400));
        foreach($blogIndex['new'] as &$item){
            $item['blog_datetime'] = FormatDateTime::formatTime($item['blog_datetime']);
        }

        return $blogIndex;
    }
}
