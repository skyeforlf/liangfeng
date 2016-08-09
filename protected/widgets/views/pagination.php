<?php
/**
 * Created by PhpStorm.
 * User: liangfeng
 * Date: 15-12-29
 * Time: 下午6:24
 */
?>
<nav>
	<ul class="pagination">
		<!----------上一页开始---------->
		<li>
			<?php if($pageInfo['currentPage']==1){ ?>
				<a href="javascript:;" aria-label="Previous">
					<span aria-hidden="true">上一页</span>
				</a>
			<?php }else{ ?>
				<a href="<?php echo $pageInfo['url'].$pageInfo['symbol'];?>currentPage=<?php echo $pageInfo['currentPage'] - 1; ?>" aria-label="Previous" class="info">
					<span aria-hidden="true">上一页</span>
				</a>
			<?php } ?>
		</li>
		<!----------上一页结束---------->


		<?php
		if($pageInfo['totalPage']>$pageInfo['max']){
			if($pageInfo['currentPage']<=$pageInfo['max']){
				for($i=1;$i<= min($pageInfo['max'] + floor($pageInfo['max']/2), $pageInfo['totalPage']);$i++){
					if($pageInfo['currentPage']==$i){
						echo "<li class='active'><a href='".$pageInfo['url'].$pageInfo['symbol']."currentPage=".$i."'>".$i."</a></li>";
					}else{
						echo "<li><a href='".$pageInfo['url'].$pageInfo['symbol']."currentPage=".$i."'>".$i."</a></li>";
					}
				}
				if($pageInfo['totalPage']>$pageInfo['max'] + floor($pageInfo['max']/2)){
					echo "<li><a href='javascript:;'>...</a></li>";
					echo "<li><a href='".$pageInfo['url'].$pageInfo['symbol']."currentPage=".$pageInfo['totalPage']."'>" . $pageInfo['totalPage'] . "</a></li>";
				}
			}elseif($pageInfo['currentPage']>$pageInfo['max']&&$pageInfo['currentPage']<$pageInfo['totalPage']-$pageInfo['max']){
				echo "<li><a href='".$pageInfo['url'].$pageInfo['symbol']."currentPage=1'>1</a></li>";
				echo "<li><a href='".$pageInfo['url'].$pageInfo['symbol']."currentPage=2'>2</a></li>";
				if($pageInfo['currentPage']>$pageInfo['max'] - floor($pageInfo['max']/2)){
					echo "<li><a href='javascript:;'>...</a></li>";
				}
				for($i=$pageInfo['currentPage'] - floor($pageInfo['max']/2);$i<=$pageInfo['currentPage'] + floor($pageInfo['max']/2);$i++){
					if($pageInfo['currentPage']==$i){
						echo "<li class='active'><a href='".$pageInfo['url'].$pageInfo['symbol']."currentPage=".$i."'>".$i."</a></li>";
					}else{
						echo "<li><a href='".$pageInfo['url'].$pageInfo['symbol']."currentPage=".$i."'>".$i."</a></li>";
					}
				}
				if($pageInfo['currentPage']<$pageInfo['totalPage'] -$pageInfo['max'] + floor($pageInfo['max']/2)){
					echo "<li><a href='javascript:;'>...</a></li>";
					echo "<li><a href='".$pageInfo['url'].$pageInfo['symbol']."currentPage=".$pageInfo['totalPage']."'>" . $pageInfo['totalPage'] . "</a></li>";
				}
			}else{
				echo "<li><a href='".$pageInfo['symbol']."currentPage=1'>1</a></li>";
				echo "<li><a href='".$pageInfo['symbol']."currentPage=1'>2</a></li>";
				if($pageInfo['currentPage']>$pageInfo['max'] + floor($pageInfo['max']/2)){
					echo "<li><a href='javascript:;'>...</a></li>";
				}
				for($i=$pageInfo['totalPage']-$pageInfo['max'];$i<=$pageInfo['totalPage'];$i++){
					if($pageInfo['currentPage']==$i){
						echo "<li class='active'><a href='".$pageInfo['url'].$pageInfo['symbol']."currentPage=".$i."'>".$i."</a></li>";
					}else{
						echo "<li><a href='".$pageInfo['url'].$pageInfo['symbol']."currentPage=".$i."'>".$i."</a></li>";
					}
				}
			}
		}else{
			for($i=1;$i<=$pageInfo['totalPage'];$i++){
                if($pageInfo['currentPage']==$i){
                    echo "<li class='active'><a href='".$pageInfo['url'].$pageInfo['symbol']."currentPage=".$i."'>".$i."</a></li>";
                }else{
				    echo "<li><a href='".$pageInfo['url'].$pageInfo['symbol']."currentPage=".$i."'>".$i."</a></li>";
                }
			}
		}
		?>
		<!----------下一页开始---------->
		<li>
			<?php if($pageInfo['currentPage']==$pageInfo['totalPage']){ ?>
				<a href="javascript:;" aria-label="Next">
					<span aria-hidden="true">下一页</span>
				</a>
			<?php }else{ ?>
				<a href="<?php echo $pageInfo['url'].$pageInfo['symbol'];?>currentPage=<?php echo $pageInfo['currentPage'] + 1; ?>" aria-label="Next" class="info">
					<span aria-hidden="true">下一页</span>
				</a>
			<?php } ?>
		</li>
		<!----------下一页结束---------->
	</ul>
</nav>
