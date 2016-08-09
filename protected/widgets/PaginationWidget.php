<?php
/**
 * Created by PhpStorm.
 * User: liangfeng
 * Date: 15-12-29
 * Time: 下午6:44
 */
class PaginationWidget extends CWidget{
	public $pageInfo;
	/* *
	 * array(
	 * 		'currentPage' => '当前页',
	 * 		'totalPage' => '总页数',
	 * 		'max' => '最多显示的页数',
	 * 		'url' => '页面跳转链接',
	 *      'symbol' => '?'    // ?|&
	 * );
	 */
	public function run(){
		$this->render('pagination',array('pageInfo'=>$this->pageInfo));
	}
}
