
<link rel="stylesheet" href="<?php echo DOMAIN_NAME; ?>/assets/mobile/css/product-detail.css">
<header class="bar bar-nav">
    <a class="pull-left icon icon-left"></a>
    <a href="javascript:;" class="pull-right icon icon-cart js-add-cart"></a>
    <h1 class="title">商品详情</h1>
</header>
<div class="content">
    <section class="slider-wrap" style="height:160px" id="banner"></section>
    <div class="product-detail">
        <div class="product-title">商品名称xxxxxxxxxxxxxxxxxxxxxxxx</div>
        <div class="product-price"><span>促销价: <b>¥ 28000.00</b></span> <span>原价: ¥ <s>36</s></span></div>
        <div class="product-other">运费:<span>¥36</span>  月销量:<span>100000</span>  总销售<span>100000</span></div>
    </div>
    <div class="buttons-tab fixed-tab" data-offset="44">
        <a href="#details" class="tab-link active button">图文详情</a>
        <a href="#parameter" class="tab-link button">产品参数</a>
        <a href="#evaluate" class="tab-link button">所有评价</a>
    </div>

    <div class="tabs">
        <div id="details" class="tab active">
            <div class="content-block">
                <div class="buttons-row">
                    <a href="#tab1-1" class="tab-link active button">Tab 1</a>
                    <a href="#tab1-2" class="tab-link button">Tab 2</a>
                    <a href="#tab1-3" class="tab-link button">Tab 3</a>
                </div>
                <div class="tabs">
                    <p class='tab active' id='tab1-1' style="height:600px">This is tab 1-1 content</p>
                    <p class='tab' id='tab1-2'>This is tab 1-2 content</p>
                    <p class='tab' id='tab1-3'>13855589778</p>
                </div>
            </div>
        </div>
        <div id="parameter" class="tab">
            <div class="content-block">
                <p style="height:600px">This is tab 2 content start</p>
                <p >This is tab 2 content end</p>
            </div>
        </div>
        <div id="evaluate" class="tab">
            <div class="content-block">
                <p style="height:600px">This is tab 3 content start</p>
                <p >This is tab 3 content end</p>
            </div>
        </div>
    </div>
</div>