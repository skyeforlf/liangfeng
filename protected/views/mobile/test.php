<div class="page" id='router3'>
    <?php $this->widget('application.widgets.MobileNavWidget');?>
    <header class="bar bar-nav">
        <a class="button button-link button-nav pull-left back" href="/docs-demos/router">
            <span class="icon icon-left"></span>
            返回
        </a>
        <h1 class='title'>路由</h1>
    </header>
    <div class="content">
        <div class="content-block">
            这是内联编写的页面，点击左上角的 <a href="#" class='back'>返回</a> 按钮返回上一页。
        </div>
    </div>
</div>
<div class="page page-current">

    <?php $this->widget('application.widgets.MobileNavWidget');?>

    <header class="bar bar-nav">
        <button class="button  button-nav pull-left button-fill">
            返回
        </button>
        <a href="" class="icon icon-refresh pull-right"></a>
        <h1 class="title">标题</h1>
    </header>

    <div class="content">
        <div class="content-block">
            <ul>
                <li><a href="<?php echo DOMAIN_NAME; ?>/index.php?r=mobile/userCenter">用户中心</a></li>
                <li><a href="<?php echo DOMAIN_NAME; ?>/index.php?r=mobile/editUserInfo">编辑用户信息</a></li>
                <li><a href="<?php echo DOMAIN_NAME; ?>/index.php?r=mobile/productDetail">商品详情</a></li>
                <li><a href="<?php echo DOMAIN_NAME; ?>/index.php?r=mobile/cards">卡片列表</a></li>
                <li><a href="<?php echo DOMAIN_NAME; ?>/index.php?r=mobile/productList">产品列表</a></li>
                <li><a href="#router3">内联的新页面</a></li>
            </ul>
        </div>
    </div>
</div>
