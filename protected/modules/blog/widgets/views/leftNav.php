<?php
/**
 * Created by PhpStorm.
 * User: liangfeng
 * Date: 2016/1/22
 * Time: 9:21
 */
?>
<div class="left">
	<div class="left-header">
		<div class="face-img"><img src="/assets/blog/images/record_pic.jpg" alt="头像"/></div>
		<p>设计窝个人博客</p>
	</div>
	<div class="left-introduction">
		<p>专注于WordPress原创主题设计开发</p>
	</div>
	<div class="left-nav">
		<ul>
			<?php
				foreach($navArray['nav'] as $key => $item){
					if(!is_array($item)){
						if($active == $key){
							echo '<li><a href="'.$item.'" class="nav-active">'.$key.'<span></span></a></li>';
						}else{
							echo '<li><a href="'.$item.'">'.$key.'<span></span></a></li>';
						}
					}else{
						echo '<li><a href="javascript:;" data-flag="1">'.$key.'<span></span></a><dl>';
						foreach($item as $data){
							echo '<dd><a href="'.$data['link'].'">'.$data['title'].'<span></span></a></dd>';
						}
						echo '</dl></li>';
					}
				}
			?>
		</ul>
	</div>
	<div class="left-search">
		<form action="#" method="post">
			<input type="text" name="search" class="search-text" placeholder="搜索"/>
			<input type="submit" value="" class="search-submit"/>
		</form>
	</div>
	<div class="left-footer">
		<p>&copy; Personal V2</p>
		<p>Powered By 设计窝</p>
	</div>
</div>
