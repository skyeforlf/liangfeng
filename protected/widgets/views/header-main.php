<?php
/**
 * Created by PhpStorm.
 * User: liangfeng
 * Date: 2016/3/8
 * Time: 9:37
 */
?>

<div id="header">
    <nav class="navbar navbar-inverse" role="banner">
        <div class="container">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
<!--                <img src="images/logo.png" alt="logo">-->
                <a class="navbar-brand" href="<?php echo DOMAIN_NAME; ?>"></a>
            </div>

            <div class="collapse navbar-collapse navbar-right">
                <ul class="nav navbar-nav">
               <?php
                    foreach($nav as $item){
                        if($item['isTwo']){
               ?>
                            <li class="dropdown <?php echo $active==$item['name'] ? 'active':''; ?>">
                                <a href="javascript:;" class="dropdown-toggle" data-toggle="dropdown"><?php echo $item['name']; ?><i class="fa fa-angle-down"></i></a>
                                <ul class="dropdown-menu">
                                    <?php
                                        foreach($item['navTwo'] as $key => $twoItem){
                                            echo '<li><a href="'.$twoItem.'">'.$key.'</a></li>';
                                        }
                                    ?>
                                </ul>
                            </li>
               <?php    }else{ ?>
                            <li <?php echo $active==$item['name'] ? 'class="active"':''; ?>><a href="<?php echo $item['url']; ?>"><?php echo $item['name']; ?></a></li>
               <?php        }
                    }
               ?>
                </ul>
            </div>
        </div><!--/.container-->
    </nav><!--/nav-->

</div><!--/header-->
