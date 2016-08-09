<?php
/**
 * Created by PhpStorm.
 * User: liangfeng
 * Date: 2016/1/22
 * Time: 9:17
 */
class LeftNavWidget extends CWidget{

	public $navData = array();
	public function init(){
        $cookie = Cookie::getInstance();
		//引入导航的数据
		$this->navData['navArray'] = require(dirname(__FILE__).'/../config/main.php');
        if(!empty($cookie->getCookie('user_stuid'))){
            $stuId = $cookie->getCookie('user_stuid');
            $blogDetail = $this->getBlogDetail($stuId);
            $title = array();
            $time = array();
            $Items = array();
            foreach($blogDetail as $item){
                $Items['title'] = mb_substr($item['blog_title'],0,10,'utf-8');
                $Items['link'] = DOMAIN_NAME.'/index.php?r=blog/blog/detail&blogId='.$item['blog_id'];
                $title[] = $Items;
                $Items['title'] = $item['blog_datetime'];
                $Items['link'] = DOMAIN_NAME.'/index.php?r=blog/blog/detail&blogId='.$item['blog_id'];
                $time[] = $Items;
            }
            $this->navData['navArray']['nav']['标题'] = $title;
            $this->navData['navArray']['nav']['归档'] = $time;
        }
		//判断哪一个为默认的页面
		$this->navData['active'] = 'Bolg首页';
		//用户信息
	}
	public function run(){
		$this->render('leftNav',$this->navData);
	}
    public function getBlogDetail($stuId){
         $blogDetail = CacheTools::getMemcacheCom('BlogDetailDao',
                                                  'getBlogDetailByStuId',
                                                  array($stuId),
                                                  BlogMemCacheKey::BLOG_STUID_DETAIL.$stuId,
                                                  array('expire'=>60)
         );
        return $blogDetail;
    }
}
