<?php
/**
 * Created by PhpStorm.
 * User: liangfeng
 * Date: 2016/1/20
 * Time: 9:16
 */
?>
<div class="contents">
	<?php
		foreach($data as $item){
	?>
			<div class="col-3">
				<div class="box-white">
					<a href="<?php echo DOMAIN_NAME.'/index.php?r=blog/blog/detail&blogId='.$item['blogId'];?>">
						<h1 title="<?php echo $item['title'];?>">
                            <?php echo mb_strlen($item['title'],'utf-8')>8 ? mb_substr($item['title'],0,8,'utf-8').'...': $item['title'];?>
                        </h1>
						<div class="col-2">作者:<?php echo $item['auther'];?></div>
						<div class="col-2">时间:<?php echo $item['time'];?></div>
						<div class="article-img"><img src="<?php echo $item['images'];?>" alt="头像"></div>
						<div class="article-contents">
							<p>
                                <?php echo mb_substr($item['contents'],0,50,'utf-8');?>...
							</p>
						</div>
					</a>
				</div>
			</div>
	<?php } ?>
	<div class="page clearfix">
		<?php $this->widget('application.widgets.PaginationWidget',
                array('pageInfo' => array('currentPage' => $currentPage,
                                          'totalPage' => $totalPage,
                                          'max' => 3,
                                          'url' => DOMAIN_NAME.'/index.php?r=blog/blog/list',
                                          'symbol' => '&'
                    )
                )
        )?>
	</div>
</div>
<script src="<?php echo DOMAIN_NAME; ?>/assets/blog/js/index.js"></script>
