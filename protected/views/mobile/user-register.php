<?php
/**
 * Created by PhpStorm.
 * User: liangfeng
 * Date: 16/8/3
 * Time: 10:54
 */
?>
<div class="page">
    <header class="bar bar-nav">
        <button class="button pull-left button-fill">返回</button>
        <button class="button pull-right button-fill open-panel" data-panel='#register-notice'>注册须知</button>
        <h1 class="title">用户注册</h1>
    </header>
    <div class="content">
        <div class="list-block">
            <form action="" id="js-register-form">
                <ul>
                    <li>
                        <div class="item-content">
                            <div class="item-media"><i class="icon icon-form-name"></i></div>
                            <div class="item-inner">
                                <div class="item-title label">姓名</div>
                                <div class="item-input">
                                    <input type="text" name="username" placeholder="你的姓名...">
                                </div>
                            </div>
                        </div>
                    </li>
                    <li>
                        <div class="item-content">
                            <div class="item-media"><i class="icon icon-form-tel"></i></div>
                            <div class="item-inner">
                                <div class="item-title label">电话</div>
                                <div class="item-input">
                                    <input type="tel" name="tel" placeholder="手机号码...">
                                </div>
                            </div>
                        </div>
                    </li>
                    <li>
                        <div class="item-content">
                            <div class="item-media"><i class="icon icon-form-password"></i></div>
                            <div class="item-inner">
                                <div class="item-title label">密码</div>
                                <div class="item-input">
                                    <input type="password" name="password" placeholder="用户密码">
                                </div>
                            </div>
                        </div>
                    </li>
                    <li>
                        <div class="item-content">
                            <div class="item-media"><i class="icon icon-form-gender"></i></div>
                            <div class="item-inner">
                                <div class="item-title label">性别</div>
                                <div class="item-input">
                                    <select name="sex">
                                        <option value="男">男</option>
                                        <option value="女">女</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                    </li>
                    <!-- Date -->
                    <li>
                        <div class="item-content">
                            <div class="item-media"><i class="icon icon-form-calendar"></i></div>
                            <div class="item-inner">
                                <div class="item-title label">生日</div>
                                <div class="item-input">
                                    <input type="date" name="birthday" placeholder="您的出生日期..." value="2016-08-03">
                                </div>
                            </div>
                        </div>
                    </li>
                    <li>
                        <div class="item-content">
                            <div class="item-media"><i class="icon icon-form-email"></i></div>
                            <div class="item-inner">
                                <div class="item-title label">邮箱</div>
                                <div class="item-input">
                                    <input type="email" name="email" placeholder="E-mail">
                                </div>
                            </div>
                        </div>
                    </li>
                    <!-- Switch (Checkbox) -->
        <!--                    <li>-->
        <!--                        <div class="item-content">-->
        <!--                            <div class="item-media"><i class="icon icon-form-toggle"></i></div>-->
        <!--                            <div class="item-inner">-->
        <!--                                <div class="item-title label">开关</div>-->
        <!--                                <div class="item-input">-->
        <!--                                    <label class="label-switch">-->
        <!--                                        <input type="checkbox">-->
        <!--                                        <div class="checkbox"></div>-->
        <!--                                    </label>-->
        <!--                                </div>-->
        <!--                            </div>-->
        <!--                        </div>-->
        <!--                    </li>-->
                    <li class="align-top">
                        <div class="item-content">
                            <div class="item-media"><i class="icon icon-form-comment"></i></div>
                            <div class="item-inner">
                                <div class="item-title label">自我介绍</div>
                                <div class="item-input">
                                    <textarea name="introduction" placeholder="自我评价..."></textarea>
                                </div>
                            </div>
                        </div>
                    </li>
                </ul>
            </form>
        </div>
        <div class="content-block">
            <div class="row">
                <div class="col-100"><a href="#" class="js-register-btn button button-big button-fill button-success">立即注册</a></div>
            </div>
        </div>
    </div>
</div>
<div class="panel-overlay"></div><!-- 可以控制单击主面板返回主面板功能 -->
<div class="panel panel-right panel-reveal theme-white" id="register-notice">
    <div class="content-block">
        <p>1.姓名4-40位数字,字母,下划线</p>
        <p>2.电话号码为11位手机号码</p>
        <p>3.密码是6-20位,非特殊字符组成</p>
        <p>4.邮箱选填,如果填写QQ默认就是QQ邮箱</p>
        <p>5.默认QQ邮箱格式是xxxxxxxx@qqcom</p>
        <p><a href="#" class="button button-fill button-success close-panel">关闭</a></p>
    </div>
</div>

