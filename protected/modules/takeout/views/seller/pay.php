<link rel="stylesheet" type="text/css" href="assets/takeout/css/pay.css"/>
<script type="text/javascript" src="js/pay.js"></script>
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
<div id="pay">
    <div id="pay-menu">
        <div id="pay-menu-con">
            <dl>
                <dd>菜单列表</dd>
                <dd id="right">价格(单)/分数</dd>
            </dl>
            <p></p>
            <?php foreach($food as $key => $item){ ?>
                <ul>
                    <li><?php echo ($key+1).".".$item['food_name'];?></li>
                    <li class='right'><?php echo $item['food_price'];?>*<?php echo $item['count'];?></li>
                </ul>
            <?php } ?>
            <p></p>
            <dl>
                <dd>合计/总价</dd>
                <dd id="right"><?php echo $totalPrice;?></dd>
            </dl>
        </div>
        <h1>请详细核对上面的订单！</h1>
        <div id="pay-menu-footer"></div>
    </div>
    <div id="pay-detail">
        <h1>订单详情</h1>
        <form action="<?php echo DOMAIN_NAME.'/index.php?r=takeout/Seller/FixedPay'?>" method="post" id="sure-pay">
            <dl>
                <input type="hidden" name="foodId" value="<?php echo $foodId;?>">
                <input type="hidden" name="foodCount" value="<?php echo $foodCount;?>">
                <input type="hidden" name="totalPrice" value="<?php echo $totalPrice;?>">
                <dd><span>送餐地址:　</span><input type="text" name="orderAddress" class="text"/></dd>
                <dd><span>给餐厅留言:　</span><textarea name="orderWords">快点哟！亲！我很饿哟！</textarea></dd>
                <dd><span>付款方式:　</span>货到付款--不支持在线支付</dd>
                <p></p>
                <dd>　　　您需支付:　<b>¥<?php echo $totalPrice;?></b>　　　　　　<input type="submit" value="提交订单" id="submit"/>　　　请认真核对信息后在提交</dd>
            </dl>
        </form>
    </div>
</div>
<div class="clearfix"></div>