<?php
////定义常量标识是自己的网页进行调用页面使用
//define("IN_TG",true);
////引入核心函数库
//require dirname(__FILE__).'/includes/global.func.php';
////判断是否为不是有主页面进入的而是非法登录页面
//if(!isset($_GET['restaurant'])){_location("非法登录！","index.php");}
?>
<link rel="stylesheet" type="text/css" href="assets/takeout/css/restaurant.css"/>
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
	<!-- ------------------------------下面就是与主页不同的地方-------------------------- -->
<div id="res-face">
    <!-- --------------------------这里是餐厅的简单介绍----------------------------- -->
    <dl>
        <dt><img src="<?php echo $restaurant['restaurant_picurl']?>" width="110" height="110"/></dt>
        <dd class="res-name"><?php echo $restaurant['restaurant_name']?></dd>
        <dd>餐厅地址：<?php echo $restaurant['restaurant_address']?></dd>
        <dd>送餐时间：<?php echo $restaurant['restaurant_send_time']?></dd>
        <dd><?php echo $restaurant['restaurant_start_price']?>元起送　免费配送　由店面配送</dd>
    </dl>
    <!-- -------------------下面是评论，订单等信息及连接地址-------------------------------- -->
    <ul>
        <li><a href="#"><span>12<b>条</b></span>所有买家评论</a></li>
        <li><span>123<b>单</b></span>餐厅订单数量</li>
        <li><span>35<b>分</b></span>平均送餐时间</li>
    </ul>
</div>
<div id="res-menu">
    <div class="takeout-attention">
        <div class="attention-title">订餐须知</div>
        <p>欢迎您使用南农网上订餐服务，包括但不限于通过南农互联网订餐网站，以及南农基于互联网或手机上网功能开发的其他订餐平台。请您务必在订餐前仔细阅读并了解以下的网上订餐须知，本网站将按以下的方式和条件为您提供网上订餐服务。如果您使用本网站的服务，即表示您完全同意并接受本须知。</p>
    </div>
    <div id="res-menu-con-left">
        <p><b>菜单</b><i></i></p>
        <dl>
        <?php
            foreach($food as $key => $item){
                echo "<dd><i>".($key+1)."</i>".$item['food_name']."</dd>";
            }
        ?>
        </dl>
        <h1></h1>
    </div>
    <div id="res-menu-con-left-bottom">
        <p></p>
        <?php
        //查询出所有餐厅的美食
        foreach($food as $key => $item){
        ?>
        <dl>
            <dt><img src="<?php echo $item['food_pic']?>" width=185 height=125/></dt>
            <dd><?php echo $item['food_name']?></dd>
            <dd>月售多少分</dd>
            <dd>¥ <b><?php echo $item['food_price']?></b> 元/份</dd>
            <dd class="shopping-trolley" title="加入购物车"></dd>
            <input type="hidden" value="<?php echo $item['food_id']; ?>">
        </dl>
        <?php }?>
        <p></p>
    </div>
    <div id="shopping-trolley">
        <div id="shopping-title">
            <ul>
                <li id="food-type">菜品</li>
                <li>数量</li>
                <li>价格</li>
            </ul>
        </div>
        <div id="shopping-order"></div>
        <div id="shopping-footer">
            <form>
                <div class="shopping-cart-logo"></div>
                <b class="btn btn-default jiesuan">去结算</b>
            </form>
        </div>
    </div>
</div>
<script src="/assets/takeout/js/restaurant.js"></script>