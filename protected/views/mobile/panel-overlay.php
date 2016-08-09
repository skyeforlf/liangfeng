<div class="page">
    <?php $this->widget('application.widgets.MobileNavWidget');?>
    <header class="bar bar-nav">
        <a href="#" class="icon icon-star pull-left open-panel" data-panel='#panel-left-demo1'></a>
        <a href="#" class="icon icon-search pull-right"></a>
        <h1 class='title'>侧栏</h1>
    </header>

    <div class="bar bar-header-secondary">
        <div class="searchbar">
            <a class="searchbar-cancel">取消</a>
            <div class="search-input">
                <label class="icon icon-search" for="search"></label>
                <input type="search" id='search' placeholder='输入关键字...'/>
            </div>
        </div>
    </div>

    <div class="content">

        <div class="searchbar">
            <div class="search-input">
                <label class="icon icon-search" for="search"></label>
                <input type="search" id='search' placeholder='输入关键字...'/>
            </div>
        </div>

        <div class="searchbar row">
            <div class="search-input col-80">
                <label class="icon icon-search" for="search"></label>
                <input type="search" id='search' placeholder='输入关键字...'/>
            </div>
            <a class="button button-fill button-primary col-20">搜索</a>
        </div>

        <div class="searchbar row">
            <div class="search-input col-85">
                <input type="search" id='search' placeholder='输入关键字...'/>
            </div>
            <a class="button button-fill button-primary col-15"><span class="icon icon-search"></span></a>
        </div>

        <div class="content-block">
            <ul>
                <li>1</li>
                <li>2</li>
                <li>3</li>
                <li>4</li>
                <li>5</li>
                <li>1</li>
                <li>2</li>
                <li>3</li>
                <li>4</li>
                <li>5</li>
                <li>1</li>
                <li>2</li>
                <li>3</li>
                <li>4</li>
                <li>5</li>
                <li>1</li>
                <li>2</li>
                <li>3</li>
                <li>4</li>
                <li>5</li>
            </ul>
            <p><a href="#" class="button button-fill open-panel" data-panel='#panel-left-demo2'>打开左侧栏</a></p>
        </div>
    </div>
</div>
<div class="panel-overlay"></div><!-- 可以控制单击主面板返回主面板功能 -->

<div class="panel panel-left panel-reveal theme-white" id='panel-left-demo1'>
    <div class="content-block">
        <p>这是一个侧栏</p>
        <p>你可以在这里放用户设置页面</p>
        <p><a href="#" class="close-panel">关闭</a></p>
    </div>
    <div class="list-block">
        <!-- .... -->
    </div>
</div>
<div class="panel panel-left panel-reveal theme-white" id='panel-left-demo2'>
    <div class="content-block">
        <p>这是二个侧栏</p>
        <p>你可以在这里放用户设置页面</p>
        <p><a href="#" class="close-panel">关闭</a></p>
    </div>
    <div class="list-block">
        <!-- .... -->
    </div>
</div>
<div class="panel panel-left panel-reveal theme-white" id='panel-left-demo3'>
    <div class="content-block">
        <p>这是三个侧栏</p>
        <p>你可以在这里放用户设置页面</p>
        <p><a href="#" class="close-panel">关闭</a></p>
    </div>
    <div class="list-block">
        <!-- .... -->
    </div>
</div>