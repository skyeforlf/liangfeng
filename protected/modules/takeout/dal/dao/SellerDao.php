<?php
/**
 * Created by PhpStorm.
 * User: liangfeng
 * Date: 16/4/8
 * Time: 23:21
 */
class SellerDao{
    //单列静态私有变量----表示自己
    private static $_instance;
    //私有的构造函数,防止进行对象的创建
    private function __construct(){}
    //防止克隆对象
    private function __clone()
    {
        // TODO: Implement __clone() method.
    }

    /**
     * 获取单列模式的对象
     * @return SellerDao
     */
    public static function getInstance(){
        if(!(self::$_instance instanceof self)){
            self::$_instance = new self;
        }
        return self::$_instance;
    }

    /**
     * 通过Id获取商店信息
     * @param array $id
     * @return mixed
     */
    public static function getRestautantDataById($id = array()){
        if(empty($id)){
            $sql = 'select * from restaurants';
        }elseif(is_array($id)){
            $sql = 'select * from restaurants where restaurant_id in ('.implode(',',$id).')';
        }else{
            $sql = 'select * from restaurants where restaurant_id = '.$id;
        }
        $command = Yii::app()->db->createCommand($sql);
        return $command->queryAll();
    }

    /**
     * 通过商店的ID来查找食物
     * @param array $id
     * @return mixed
     */
    public static function getFoodDataByRestaurantId($id = array()){
        if(empty($id)){
            $sql = 'select * from foods';
        }elseif(is_array($id)){
            $sql = 'select * from foods where food_rest_id in ('.implode(',',$id).')';
        }else{
            $sql = 'select * from foods where food_rest_id = '.$id;
        }
        $command = Yii::app()->db->createCommand($sql);
        return $command->queryAll();
    }
    /**
     * 通过美食的ID来查找食物
     * @param array $id
     * @return mixed
     */
    public static function getFoodDataByFoodId($id = array()){
        if(empty($id)){
            $sql = 'select * from foods';
        }elseif(is_array($id)){
            $sql = 'select * from foods where food_id in ('.implode(',',$id).')';
        }else{
            $sql = 'select * from foods where food_id = '.$id;
        }
        $command = Yii::app()->db->createCommand($sql);
        return $command->queryAll();
    }

    public static function insertOrder($params){
        $dbConn = Yii::app()->db;
        $transaction = $dbConn->beginTransaction();
        $orderSql = 'insert into orders (order_id,order_user_stuid,order_time,order_remark,order_address,order_totalprice) VALUES (:order_id,:order_user_stuid,now(),:order_remark,:order_address,:order_totalprice)';
        $orderDetailSql = 'insert into order_detail (orderdetail_orderid,orderdetail_foodid,orderdetail_foodnum) VALUES ';
        foreach($params['foodIds'] as $key => $foodIdItem){
            $orderDetailSql.= '('.$params['orderId'].','.$foodIdItem.','.$params['foodCounts'][$key].'),';
        }
        $orderDetailSql = substr($orderDetailSql,0,strlen($orderDetailSql)-1);
        try{
            $orderCommand = $dbConn->createCommand($orderSql);
            $orderCommand->bindParam(':order_id',$params['orderId'],PDO::PARAM_STR);
            $orderCommand->bindParam(':order_user_stuid',$params['stuId'],PDO::PARAM_STR);
            $orderCommand->bindParam(':order_remark',$params['orderWords'],PDO::PARAM_STR);
            $orderCommand->bindParam(':order_address',$params['orderAddress'],PDO::PARAM_STR);
            $orderCommand->bindParam(':order_totalprice',$params['totalPrice'],PDO::PARAM_STR);

            $orderDetailCommand = $dbConn->createCommand($orderDetailSql);

            $orderCommand->execute();
            $orderDetailCommand->execute();
            $transaction->commit();
        }catch(Exception $e){
            $transaction->rollBack();
        }
        return true;
    }
}