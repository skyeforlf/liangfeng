<?php
/**
 * Created by PhpStorm.
 * User: liangfeng
 * Date: 2016/1/8
 * Time: 14:00
 */

?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Document</title>
</head>
<body>
</body>
<script type="text/javascript">
	(function(){
		var p = {
			url:location.href, /*获取URL，可加上来自分享到QQ标识，方便统计*/
			desc:'', /*分享理由(风格应模拟用户对话),支持多分享语随机展现（使用|分隔）*/
			title:'', /*分享标题(可选)*/
			summary:'', /*分享摘要(可选)*/
			pics:'', /*分享图片(可选)*/
			flash: '', /*视频地址(可选)*/
			site:'', /*分享来源(可选) 如：QQ分享*/
			style:'201',
			width:32,
			height:32
		};
		var s = [];
		for(var i in p){
			s.push(i + '=' + encodeURIComponent(p[i]||''));
		}
		document.write(['<a class="qcShareQQDiv" href="http://connect.qq.com/widget/shareqq/index.html?',s.join('&'),'" target="_blank">分享到QQ</a>'].join(''));
	})();
</script>
<script src="http://connect.qq.com/widget/loader/loader.js" widget="shareqq" charset="utf-8"></script>
<a target="_blank" href="http://sighttp.qq.com/authd?IDKEY=c319843289d4cd03bd6f190d2f2c37fd40e9a625e902236e"><img border="0" src="http://wpa.qq.com/imgd?IDKEY=c319843289d4cd03bd6f190d2f2c37fd40e9a625e902236e&pic=51" alt="点击这里给我发消息" title="点击这里给我发消息"></a>
</html>
<!--<div class="container-fluid">
	<div class="row">
		<div class="col-xs-10">
			col-xs-10
		</div>
		<div class="col-xs-2">
			<?php /*$this->widget('application.widgets.CalendarWidget',array('year'=>2015,'month'=>12,'day'=>19)); */?>
		</div>
	</div>
</div>-->