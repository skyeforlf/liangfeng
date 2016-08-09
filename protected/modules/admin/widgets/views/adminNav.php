<?php
/**
 * Created by PhpStorm.
 * User: liangfeng
 * Date: 16/3/29
 * Time: 23:30
 */
?>
<nav class="navbar-default navbar-side" role="navigation">
    <div class="sidebar-collapse">
        <ul class="nav" id="main-menu">
            <li>
                <div class="user-img-div">
                    <img src="<?php echo $face;?>" class="img-thumbnail" />

                    <div class="inner-text">
                        <?php echo $name;?>
                        <br />
                        <small><?php echo $time;?></small>
                    </div>
                </div>
            </li>
            <li>
                <a class="active-menu" href="<?php echo DOMAIN_NAME.'/index.php?r=admin/index/index'; ?>">
                    <i class="fa fa-dashboard "></i>个人中心首页
                </a>
            </li>
            <li>
                <a href="javascript:;"><i class="fa fa-desktop "></i>数据修改中心<span class="fa arrow"></span></a>
                <ul class="nav nav-second-level">
                    <li>
                        <a href="<?php echo DOMAIN_NAME.'/index.php?r=admin/UpdateData/Attribute'; ?>"><i class="fa fa-circle-o"></i>必要信息</a>
                    </li>
                    <li>
                        <a href="<?php echo DOMAIN_NAME.'/index.php?r=admin/UpdateData/OtherInfo'; ?>"><i class="fa fa-bell "></i>额外信息</a>
                    </li>
                    <li>
                        <a href="<?php echo DOMAIN_NAME.'/index.php?r=admin/UpdateData/SchAndLang'; ?>"><i class="fa fa-edit"></i>学校及语言信息</a>
                    </li>
                    <li>
                        <a href="icons.html"><i class="fa fa-bug "></i>经历信息</a>
                    </li>
                </ul>
            </li>
            <li>
                <a href="#"><i class="fa fa-edit"></i>经历存档<span class="fa arrow"></span></a>
                <ul class="nav nav-second-level">

                    <li>
                        <a href="<?php echo DOMAIN_NAME.'/index.php?r=admin/index/experienceList'; ?>"><i class="fa fa-desktop "></i>经历列表</a>
                    </li>
                    <li>
                        <a href="<?php echo DOMAIN_NAME.'/index.php?r=admin/index/addExperience'; ?>"><i class="fa fa-bug "></i>添加经历</a>
                    </li>

                </ul>
            </li>
            <li>
                <a href="<?php echo DOMAIN_NAME.'/index.php?r=admin/index/addBlog'; ?>"><i class="fa fa-anchor "></i>添加博客博文</a>
            </li>
            <li>
                <a href="#"><i class="fa fa-comments-o"></i>我的留言板(未扩展功能)</a>
            </li>
            <li>
                <a href="#"><i class="fa fa-plus"></i>我的好友列表(未扩展功能)</a>
            </li>
        </ul>

    </div>

</nav>
