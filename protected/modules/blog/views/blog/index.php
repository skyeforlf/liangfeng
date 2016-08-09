<?php
/**
 * Created by PhpStorm.
 * User: liangfeng
 * Date: 16/3/16
 * Time: 10:13
 */
?>
<section id="blog" class="container-fluid">
    <div class="blog-index-title">
        <h2 class="blog-index-h2">Blogs</h2>
    </div>
    <div class="blog">
        <div class="row">
            <div class="col-md-9">
                <?php
                    foreach($pv as $item){
                ?>
                <div class="blog-item">
                    <div class="row">
                        <div class="col-xs-12 col-sm-2 text-center">
                            <div class="entry-meta">
                                <span id="publish_date"><?php echo $item['blog_datetime']?></span>
                                <span><i class="fa fa-user">
                                    </i> <a href="#"><?php echo $item['userInfo']['user_name']?></a>
                                </span>
                                <span>
                                    <i class="fa fa-comment"></i>
                                    <a href="javascript:;">
                                        <?php echo count($item['discuss'])?>00评论
                                    </a>
                                </span>
                                <span>
                                    <i class="fa fa-heart"></i>
                                    <a href="javascript:;"><?php echo $item['blog_attention']?>关注</a>
                                </span>
                                <span>
                                    <i class="fa fa-phone"></i>
                                    <a href="javascript:;">***<?php echo substr($item['userInfo']['user_tel'],-4,strlen($item['userInfo']['user_tel']))?></a>
                                </span>
                            </div>
                        </div>

                        <div class="col-xs-12 col-sm-10 blog-content">
                            <a href="javascript:;">
                                <img class="img-responsive img-blog" src="<?php echo $item['blog_picurl']?>" width="100%" alt="图片" />
                            </a>
                            <h2><a href="<?php echo DOMAIN_NAME.'/index.php?r=blog/blog/detail&blogId='.$item['blog_id'];?>"><?php echo $item['blog_title']?></a></h2>
                            <h3><?php echo mb_substr($item['blog_contents'],0,50,'utf-8').'......'?></h3>
                            <a class="btn btn-primary readmore" href="<?php echo DOMAIN_NAME.'/index.php?r=blog/blog/detail&blogId='.$item['blog_id'];?>">
                                查看详情
                                <i class="fa fa-angle-right"></i>
                            </a>
                        </div>
                    </div>
                </div><!--/.blog-item-->
                <?php } ?>
            </div><!--/.col-md-8-->

            <aside class="col-md-3">
                <div class="widget categories">
                    <h3>最近博文</h3>
                    <div class="row">
                        <div class="col-sm-12">
                            <?php foreach($new as $item){ ?>
                            <a href="<?php echo DOMAIN_NAME.'/index.php?r=blog/blog/detail&blogId='.$item['blog_id'];?>">
                                <div class="single_comments">
                                    <img src="<?php echo $item['blog_picurl']?>" width="64" height="64" alt=""  />
                                    <p title="<?php echo $item['blog_title']?>">
                                        <?php echo mb_substr($item['blog_title'],0,6,'utf-8')?>
                                    </p>
                                    <div class="entry-meta small muted">
                                        <span>时间:<a href="javascript:;">
                                                <?php echo $item['blog_datetime']?>
                                            </a>
                                        </span>
                                    </div>
                                </div>
                                <div class="clearfix"></div>
                            </a>
                            <?php } ?>
                        </div>
                    </div>
                </div><!--/.recent comments-->
                <div class="widget categories">
                    <h3>最受关注</h3>
                    <div class="row">
                        <div class="col-sm-12">
                            <?php foreach($attention as $item){ ?>
                            <a href="<?php echo DOMAIN_NAME.'/index.php?r=blog/blog/detail&blogId='.$item['blog_id'];?>">
                                <div class="single_comments">
                                    <img src="<?php echo $item['blog_picurl']?>" alt=""  />
                                    <p title="<?php echo $item['blog_title']?>">
                                        <?php echo mb_substr($item['blog_title'],0,6,'utf-8')?>
                                    </p>
                                    <div class="entry-meta small muted">
                                        <span>时间:<a href="javascript:;">
                                                <?php echo $item['blog_datetime']?>
                                            </a>
                                        </span>
                                    </div>
                                </div>
                                <div class="clearfix"></div>
                            </a>
                            <?php } ?>
                        </div>
                    </div>
                </div><!--/.recent comments-->

                <div class="widget categories">
                    <h3>种类Tab</h3>
                    <div class="row">
                        <div class="col-sm-11">
                            <ul class="blog_category">
                                <li><a href="#">计算机 <span class="badge">04</span></a></li>
                                <li><a href="#">手机 <span class="badge">10</span></a></li>
                                <li><a href="#">Iphone <span class="badge">06</span></a></li>
                                <li><a href="#">Windows <span class="badge">25</span></a></li>
                                <li><a href="#">旅游景点 <span class="badge">04</span></a></li>
                                <li><a href="#">周末玩点 <span class="badge">10</span></a></li>
                                <li><a href="#">校园百科 <span class="badge">06</span></a></li>
                                <li><a href="#">情侣汇 <span class="badge">25</span></a></li>
                            </ul>
                        </div>
                    </div>
                </div><!--/.categories-->
            </aside>
        </div><!--/.row-->
    </div>
</section><!--/#blog-->

