<?php
/**
 * Created by PhpStorm.
 * User: liangfeng
 * Date: 16/3/17
 * Time: 11:21
 *
 */
class BlogListModel{
    /**
     * @return mixed
     */
    public function getBlogList($stuId = false){
        if($stuId){
            $blogList = CacheTools::getMemcacheCom('BlogDetailDao',
                'getBlogDetailByStuId',
                array($stuId),
                BlogMemCacheKey::BLOG_STUID_DETAIL.$stuId,
                array('expire'=>86400)
            );
        }else{
            $blogList = CacheTools::getMemcacheCom('BlogDetailDao',
                'getBlogDetail',
                array('blog_datetime',true),
                BlogMemCacheKey::Blog_LIST_DETAIL,
                array('expire'=>86400)
            );
        }

        $returnData = array();
        $itemData = array();
        foreach($blogList as $item){
            $itemData['blogId'] = $item['blog_id'];
            $itemData['title'] = $item['blog_title'];
            $itemData['images'] = $item['blog_picurl'];
            $itemData['auther'] = $item['blog_auther'];
            $itemData['contents'] = $item['blog_contents'];
            $itemData['time'] = FormatDateTime::formatTime($item['blog_datetime']);

            $returnData[] = $itemData;
        }
        return $returnData;
    }
}
