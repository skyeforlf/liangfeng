<?php
/**
 * Created by PhpStorm.
 * User: liangfeng
 * Date: 16/8/4
 * Time: 13:54
 */
?>
<link rel="stylesheet" href="<?php echo DOMAIN_NAME; ?>/assets/mobile/css/product-list.css">

<header class="bar bar-nav">
    <a href="javascript:;" class="icon icon-left pull-left"></a>
    <a href="javascript:;" class="pull-right icon icon-cart js-add-cart"></a>
    <h1 class='title'>商品列表</h1>
</header>

<!--搜索start-->
<div class="bar bar-header-secondary">
    <div class="searchbar">
        <a class="searchbar-cancel">取消</a>
        <div class="search-input">
            <label class="icon icon-search" for="search"></label>
            <input type="search" id='search' placeholder='输入关键字...'/>
        </div>
    </div>
</div>
<!--搜索end-->
<!--筛选start-->
<!--<div class="filter-bar J_sortTab">-->
<!--    <div class="viewtype-switch J_SwitchViewtype">-->
<!--        <div class="icons-list"></div>-->
<!--    </div>-->
<!--    <ul class="sort-tab">-->
<!--        <li class="droplist-trigger selected">-->
<!--            <span class="text">综合排序</span>-->
<!--            <span class="arrow"></span>-->
<!--            <span class="bar"></span>-->
<!--        </li>-->
<!--        <li class="sort" data-value="_sale">销量优先<span class="bar"></span></li>-->
<!--        <li><div class="top-bar-e"><span id="J_Sift"><i class="icons-sift"></i>筛选</span></div></li>-->
<!--    </ul>-->
<!--    <div class="droplist droplist-expand">-->
<!--        <ul class="sorts" style="margin-left: 21px;">-->
<!--            <li class="sort selected" data-value="">综合排序<span class="icons-checked-icon"></span></li>-->
<!--            <li class="sort" data-value="_bid">价格从高到低<span class="icons-checked-icon"></span></li>-->
<!--            <li class="sort" data-value="bid">价格从低到高<span class="icons-checked-icon"></span></li>-->
<!--            <li class="sort" data-value="_ratesum">信用排序<span class="icons-checked-icon"></span></li>-->
<!--        </ul>-->
<!--    </div>-->
<!--</div>-->
<!--筛选end-->
<div class="content">
    <div class="filter">
        <ul>
            <li>综合筛选<span class="icon icon-caret"></span></li>
            <li>销量有限</li>
            <li>筛选</li>
<!--            <li>样式</li>-->
        </ul>
    </div>
    <div class="style"><span class="icon icon-app"></span></div>


    <div class="card">
        <div class="card-content">
            <div class="list-block media-list">
                <ul>
                    <li class="item-content">
                        <div class="item-media">
                            <img src="http://gqianniu.alicdn.com/bao/uploaded/i4//tfscom/i3/TB10LfcHFXXXXXKXpXXXXXXXXXX_!!0-item_pic.jpg_250x250q60.jpg">
                        </div>
                        <div class="item-inner">
                            <div class="item-title-row">
                                <div class="d-title">夏季男衬衫长袖中年纯棉薄款格子衬衣父亲装</div>
                            </div>
                            <div class="item-price">
                                <div class="sale-price">
                                    <label for="">促销价:</label>
                                    <span class="price-icon">¥</span>
                                    <span class="price-num">26000</span>
                                </div>
                                <div class="initial-price">
                                    <s>
                                        <label for=""> 原价:</label>
                                        <span class="price-icon">¥</span>
                                        <span class="price-num">26 </span>
                                    </s>
                                </div>
                            </div>
                            <div class="item-other">
                                <div class="freight">免运费</div>
                                <div class="pay-num">99999人付款</div>
                                <div class="city">北京</div>
                            </div>
                        </div>
                    </li>
                </ul>
            </div>
        </div>
    </div>
    <div class="card">
        <div class="card-content">
            <div class="list-block media-list">
                <ul>
                    <li class="item-content">
                        <div class="item-media">
                            <img src="http://gqianniu.alicdn.com/bao/uploaded/i4//tfscom/i3/TB10LfcHFXXXXXKXpXXXXXXXXXX_!!0-item_pic.jpg_250x250q60.jpg" width="44">
                        </div>
                        <div class="item-inner">
                            <div class="item-title-row">
                                <div class="item-title">标题</div>
                            </div>
                            <div class="item-subtitle">子标题</div>
                        </div>
                    </li>
                </ul>
            </div>
        </div>
    </div>
</div>
