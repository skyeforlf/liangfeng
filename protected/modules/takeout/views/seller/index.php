<?php 
//	//定义常量标识是自己的网页进行调用页面使用
//	define("IN_TG",true);
//	//引入核心函数库
//	require dirname(__FILE__).'/includes/global.func.php';
//	//搜索餐厅和食物的时候的一些变量问题
//	$default = $_GET['default'];//默认搜索
//	$sales_volume = $_GET['sales_volume'];//销量
//	$assess = $_GET['assess'];//评价
//	$speed = $_GET['speed'];//送餐速度
//	if($default==1){
//		$default = 1;
//	}else {
//		$default = 0;
//		if($sales_volume==1){
//			$sales_volume=1;
//		}else{
//			$sales_volume=0;
//			if($assess==1){
//				$assess=1;
//			}else{
//				$assess=0;
//				if($speed==1){
//					$speed=1;
//				}else{
//					$speed=0;
//				}
//			}
//		}
//	}
//	if($sales_volume==0&&$assess==0&&$speed==0){
//		$default=1;
//	}
//	//退出的操做，登录后点击退出账号的操做
//	if($_GET['action']==log_out){
//		if(isset($_COOKIE['stuid'])){
//			setcookie("stuid","",time()-1);
//		}
//		if(isset($_COOKIE['res_tel'])){
//			setcookie("res_tel","",time()-1);
//		}
//		_location(null,'index.php');
//	}
?>
<div id="title">
    <!-- ----------最上边的标题部分---包括简短的导航等------------- -->
    <div id="title-nav">
        <ul>
            <li><a href="reg_restaurant.php">注册卖家</a></li>
            <li> | </li>
            <li><a href="seller_log.php">我是卖家</a></li>
            <li><a href="#">常见问题</a></li>
            <li><a href="#">联系客服</a></li>
        </ul>
    </div>
</div>

<div id="header">
    <!-- ------------这里有一个简单的搜索框能搜索食物和饭店名字------------- -->
    <div id="header-search">
        <div class="seller-title" title="南农外卖">南农外卖</div>
        <div class="search">
            <form>
                <input type="text" name="search" id="search_text" placeholder="搜索餐厅，美食"/><input type="submit" value="搜索" id="search_button"/>
            </form>
        </div>
        <ul>
            <li id="book_meal"><a href="my_order_form.php">我的订单</a></li>
        </ul>
    </div>
</div>
<div id="content">
    <div id="rest-or-food">
        <ul>
            <li><a href="index.php" id="rest">餐厅</a></li>
        </ul>
    </div>
    <div id="order">
        <ul>
            <li class="style-background">默认排序</li>
<!--            <li><a href="index.php?default=1">默认排序</a></li>-->
<!--            <li class="style-background">销量<b>↓</b></li>-->
            <li class="order-desc"><a href="#">销量<b>↓</b></a></li>
            <li>起送价格</li>
        </ul>
    </div>
    <div id="restaurant">
        <?php foreach($restaurant as $item){?>
        <a href="<?php echo DOMAIN_NAME.'/index.php?r=takeout/Seller/Restaurant&restId='.$item['restaurant_id']; ?>">
            <div id="rest-one">
                <dl>
                    <dt><img src="<?php echo $item['restaurant_picurl']?>" width=80 height=80/></dt>
                    <dd class="rest-name" title=""><?php echo $item['restaurant_name']?></dd>
                    <dd><?php echo $item['restaurant_address']?></dd>
                    <dd><?php echo $item['restaurant_start_price']?>元起送 免费配送</dd>
                    <dd><span>月售 5353 单</span></dd>
                </dl>
                <h1>平均送餐时间：35分钟　支付方式：货到付款</h1>
            </div>
        </a>
        <?php } ?>
    <h2><p></p><a href="#">显示全部</a></h2>
    </div>
</div>
