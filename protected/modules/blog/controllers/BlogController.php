<?php
/**
 * Created by PhpStorm.
 * User: liangfeng
 * Date: 2016/1/20
 * Time: 9:15
 */
class BlogController extends Controller{

	public $layout = '/layouts/main';

	private $_di = null;

    /**
     * 初始化函数
     */
	public function init(){
		parent::init();

		$this->_di = Di::getInstance();

		$this->_di->setShared('BlogDetailModel', new BlogDetailModel());

		$this->_di->setShared('BlogIndexModel', new BlogIndexModel());

        $this->_di->setShared('BlogListModel', new BlogListModel());
	}

    /**
     * blog主页
     */
	public function actionIndex(){

		$blogDetail = $this->_di->get('BlogIndexModel')->getIndexBlogDetail();

		$this->render('index',$blogDetail);

	}

    /**
     * blog列表页面
     */
	public function actionList(){
		Yii::app()->clientScript->registerCssFile('/assets/blog/css/index.css');
        $blogDetail['currentPage'] = Yii::app()->request->getQuery('currentPage');

        $stuId = Yii::app()->request->getQuery('stuId');

        $blogDetail['blogNumber'] = 9;
        if(empty($stuId)&&is_numeric($stuId)){
            $blogDetail['data'] = $this->_di->get('BlogListModel')->getBlogList($stuId);
        }else{
            $blogDetail['data'] = $this->_di->get('BlogListModel')->getBlogList();
        }
        $blogDetail['totalPage'] = ceil(count($blogDetail['data'])/($blogDetail['blogNumber']));
        //当前页面的计算,得到自己想要的当前页
        if(empty($blogDetail['currentPage'])||!is_numeric($blogDetail)||$blogDetail['currentPage']<=1){
            $blogDetail['currentPage'] = 1;
        }elseif($blogDetail['currentPage']>$blogDetail['totalPage']){
            $blogDetail['currentPage'] = $blogDetail['totalPage'];
        }else{
            $blogDetail['currentPage'] = floor($blogDetail['currentPage']);
        }
		$this->render('list',$blogDetail);
	}

    /**
     * blog详情页面
     */
	public function actionDetail(){
		//引入脚本文件
		Yii::app()->clientScript->registerCssFile('/assets/blog/css/detail.css');
		Yii::app()->clientscript->registerScriptFile('/assets/blog/js/detail.js');

		//获取ID标识符
		$blogId = Yii::app()->request->getQuery('blogId');

		if(empty($blogId)){
			$this->redirect(DOMAIN_NAME.'/index.php?r=blog/blog/index');
		}

		//获取blog详情
		$blogDetail['baseInfo'] = $this->_di->get('BlogDetailModel')->getBlogDetailById($blogId);

		$this->render('detail',$blogDetail);
	}

    /**
     * 异步设置PV
     */
	public function actionSetPvAjax(){
		$blogId = Yii::app()->request->getQuery('blogId');
		$this->_di->get('BlogDetailModel')->updatePvAjax($blogId);
	}

    /**
     * 异步实现评论返回评论的数据
     * @return bool
     */
    public function actionSetDiscuss(){
        $blogId = Yii::app()->request->getPost('blogId');

        $stuid = Yii::app()->request->getPost('stuid');

        if(empty($blogId) && empty($stuid)){
            return false;
        }
        $contents = Yii::app()->request->getPost('contents');
        $data = $this->_di->get('BlogDetailModel')->writeDiscuss($blogId,$stuid,$contents);
        echo json_encode($data);
    }
    public function actionSetAttention(){
        $blogId = Yii::app()->request->getPost('blogId');

        $stuid = Yii::app()->request->getPost('stuid');

        if(empty($blogId) && empty($stuid)){
            return false;
        }
        $data = $this->_di->get('BlogDetailModel')->writeAttention($stuid,$blogId);

        $jsonData = array(
            'success' => false,
            'flag' => 1,
            'data' => $data
        );
        if(is_array($data)){

        }elseif($data == 0){
            $jsonData['flag'] = 0;
        }else{
            $jsonData['success'] = true;
        }
        echo json_encode($jsonData);
    }
}
