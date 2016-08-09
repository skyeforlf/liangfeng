<?php
/**
 * Created by PhpStorm.
 * User: liangfeng
 * Date: 2016/1/20
 * Time: 9:16
 */
?>
<div class="center-content">
	<input type="hidden" value="<?php echo $baseInfo['blog_id']; ?>" class="blog-id">
	<h1 class="h1-font-color">语录</h1>
	<div class="record-content">
		<h2><?php echo $baseInfo['blog_title']; ?></h2>
		<img src="<?php echo $baseInfo['blog_picurl']; ?>" alt="语录的大图片展示"/>
		<p>
			<?php echo $baseInfo['blog_contents']; ?>
		</p>
	</div>
	<div class="record-detail">
		<ul>
			<li><span class="icon record"></span><a href="javascript:;">语录</a></li>
			<li><span class="icon date"></span><a href="javascript:;"><?php echo $baseInfo['blog_datetime']; ?></a></li>
			<li class="send-attention">
                <span class="icon attention"></span>
                <a href="javascript:;"><b class="att-num"><?php echo $baseInfo['attentionCount']; ?></b>人关注</a>
            </li>
			<li class="btn-discuss" data-flag="0">
                <span class="icon lw"></span><a href="javascript:;">留言</a>
            </li>
			<li><span class="icon bt"></span><a href="javascript:;"><?php echo $baseInfo['blog_pv']; ?>人浏览</a></li>
		</ul>
		<div class="discuss">
			<dl>
			<?php
				$i=0;
				foreach($baseInfo['discuss'] as $discuss){
				$i++;
				if($i%2){
			?>
				<dt>
					<div class="discuss-face"><img src="<?php echo $discuss['user_facepic']; ?>" alt="头像"></div>
					<div class="discuss-content"><span><?php echo $discuss['user_name']; ?>：</span><?php echo $discuss['dis_contents']; ?></div>
					<div class="discuss-time"><span>时间：</span><?php echo $discuss['dis_date']; ?></div>
				</dt>
				<?php }else{ ?>
				<dd>
					<div class="discuss-space"></div>
					<div class="discuss-face"><img src="<?php echo $discuss['user_facepic']; ?>" alt="头像"></div>
					<div class="discuss-content"><span><?php echo $discuss['user_name']; ?>：</span><?php echo $discuss['dis_contents']; ?></div>
					<div class="discuss-time"><span>时间：</span><?php echo $discuss['dis_date']; ?></div>
				</dd>
				<?php } ?>
			<?php } ?>
			</dl>
			<div class="report-discuss">
				<textarea name="reportDiscuss" placeholder="我也来说一句..."></textarea>
			</div>
			<div class="btn btn-primary send-discuss">发表</div>
		</div>
	</div>
</div>
