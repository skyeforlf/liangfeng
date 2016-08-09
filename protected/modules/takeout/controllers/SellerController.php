<?php
class SellerController extends Controller{
    private $_di = null;
	public $layout = '/layouts/main';          //选择使用哪个布局文件
    public function init(){
        parent::init();
        $this->_di = Di::getInstance();

        $this->_di->setShared('RestaurantModel',new RestaurantModel());

        $this->_di->setShared('FoodModel',new FoodModel());

        $this->_di->setShared('SellerModel',new SellerModel());
    }
    public function actionIndex(){
        $restaurant =  $this->_di->get('RestaurantModel')->getRestaurantData();
        $this->render('index',array('restaurant'=>$restaurant));
    }

    /**
     * 餐厅信息,主要是餐厅的美食与餐厅的基本信息
     */
    public function actionRestaurant(){
        //获取餐厅ID
        $restId = Yii::app()->request->getQuery('restId');
        if(empty($restId)){
            $this->redirect(DOMAIN_NAME.'/index.php?r=takeout/Seller/Index');
        }
        //获取餐厅信息
        $restaurant =  $this->_di->get('RestaurantModel')->getSingleRestaurantData($restId);

        if(empty($restaurant)){
            $this->redirect(DOMAIN_NAME.'/index.php?r=takeout/Seller/Index');
        }
        //获取餐厅美食信息
        $food =  $this->_di->get('FoodModel')->getFoodData($restId);

        $this->render('restaurant',array('restaurant'=>$restaurant[0],'food'=>$food));

    }

    public function actionPay(){

        $foodId = Yii::app()->request->getPost('foodId');

        $foodCount = Yii::app()->request->getPost('foodCount');

        $foodId = $this->getArrayData($foodId);
        $food = SellerDao::getFoodDataByFoodId($foodId);
        $foodCount = $this->getArrayData($foodCount);
        $totalPrice = 0;
        foreach($food as $key => &$item){
            $item['count'] = $foodCount[$key];
            $totalPrice += $item['food_price'] * $foodCount[$key];
        }
        $data['totalPrice'] = $totalPrice;
        $data['food'] = $food;
        $data['foodId'] = implode(',',$foodId);
        $data['foodCount'] = implode(',',$foodCount);

        $this->render('pay',$data);
    }
    public function actionFixedPay(){
        //获取食物Id
        $foodId = Yii::app()->request->getPost('foodId');
        $foodId = explode(',',$foodId);
        //获取食物的数量
        $foodCount = Yii::app()->request->getPost('foodCount');
        $foodCount = explode(',',$foodCount);
        //获取送餐地址
        $address = Yii::app()->request->getPost('orderAddress');
        //获取订餐总价
        $totalPrice = Yii::app()->request->getPost('totalPrice');
        //获取订餐留言之类的
        $orderWords = Yii::app()->request->getPost('orderWords');
        $orderWords = ValitateForm::validateTextarea($orderWords);

        if(empty($foodId)||empty($foodCount)){
            $this->redirect(DOMAIN_NAME.'/index.php?r=takeout/seller/index');
        }
        $stuId = Cookie::getCookie('user_stuid');
        if(empty($stuId)){
            $this->redirect(DOMAIN_NAME.'/index.php?r=login/index');
        }

        $params = array(
            'foodIds' => $foodId,
            'foodCounts' => $foodCount,
            'orderAddress' => $address,
            'orderWords' => $orderWords,
            'totalPrice' => $totalPrice,
            'stuId' => $stuId,
        );
        $result = $this->_di->get('SellerModel')->insertOrder($params);
        if($result){
            $this->redirect(DOMAIN_NAME.'/index.php?r=admin/index/orderList');
        }else{
            $this->redirect(DOMAIN_NAME.'/index.php?r=takeout/seller/index');
        }
    }

    /**
     * 返回数组数据
     * @param $str      1,2,3,4,5,
     * @return array    array(1,2,3,4,5);
     */
    private function getArrayData($str){
        $str = substr($str,0,strlen($str)-1);
        return explode(',',$str);
    }
}