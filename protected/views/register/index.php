<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<title>校园生活之注册界面</title>
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta name="description" content="">
	<meta name="author" content="">

	<!-- CSS -->
	<link rel="stylesheet" href="/css/bootstrap.min.css">
	<link rel="stylesheet" href="/assets/register/css/style.css">
</head>
<body>
<div class="header">
	<div class="container">
		<div class="row">
			<div class="logo col-xs-7">
				<h1><a href="">College Life<span class="red">.</span></a></h1>
			</div>
			<div class="links col-xs-5">
				<a class="home" href="" rel="tooltip" data-placement="bottom" data-original-title="Home"></a>
				<a class="blog" href="" rel="tooltip" data-placement="bottom" data-original-title="Blog"></a>
			</div>
		</div>
	</div>
</div>

<div class="register-container container">
	<div class="row">
		<div class="iphone col-md-5 col-md-0">
			<img src="/assets/register/images/iphone.png" alt="手机美图">
		</div>
		<div class="register col-md-6 col-md-12">
			<form action="/index.php?r=register/index&action=register" method="post" class="form-horizontal">
				<h2><span class="red"><strong>校园神州行</strong></span>-注册</h2>
				<div class="form-group">
					<label for="username" class="col-sm-3 control-label">姓名：</label>
					<div class="col-sm-9">
						<input class="form-control" type="text" id="username" name="username" placeholder="姓名{2-40}字...">
						<p class="error-message">格式不对呀</p>
					</div>
				</div>
				<div class="form-group">
					<label for="studentId" class="col-sm-3 control-label">学号：</label>
					<div class="col-sm-9">
						<input class="form-control" type="text" id="studentId" name="studentId" placeholder="填写你的学号：19212226...">
						<p class="error-message">格式不对呀</p>
					</div>
				</div>
				<div class="form-group">
					<label for="password" class="col-sm-3 control-label">密码：</label>
					<div class="col-sm-9">
						<input class="form-control" type="password" id="password" name="password" placeholder="填写你的密码{6-20}位字母、数字等...">
					</div>
				</div>
				<div class="form-group">
					<label for="validatePwd" class="col-sm-3 control-label">确认密码：</label>
					<div class="col-sm-9">
						<input class="form-control" type="password" id="validatePwd" name="validatePwd" placeholder="验证你的密码...">
						<p class="error-message">格式不对呀</p>
					</div>
				</div>
				<div class="form-group">
					<label for="telephone" class="col-sm-3 control-label">手机号：</label>
					<div class="col-sm-9">
						<input class="form-control" type="text" id="telephone" name="telephone" placeholder="填写手机号码：1开始的11位数字...">
						<p class="error-message">格式不对呀</p>
					</div>
				</div>
				<div class="form-group">
					<label for="qq" class="col-sm-3 control-label">Q Q：</label>
					<div class="col-sm-9">
						<input class="form-control" type="text" id="qq" name="qq" placeholder="填写个人QQ{6-10}位数字...">
						<p class="error-message">格式不对呀</p>
					</div>
				</div>
				<div class="form-group">
					<label for="email" class="col-sm-3 control-label">Email：</label>
					<div class="col-sm-9">
						<input class="form-control" type="text" id="email" name="email" placeholder="Email空，默认是QQ邮箱：123456@qq.com...">
						<p class="error-message">格式不对呀</p>
					</div>
				</div>
				<?php
				if(!$resultMessage['success']){ ?>
					<div class="form-group">
						<textarea class="form-control result-message" disabled="disabled"><?php echo $resultMessage['message'];?></textarea>
					</div>
				<?php }?>
				<button type="submit">注册</button>
			</form>
		</div>
	</div>
</div>
<div align="center">Copyright &copy; 2016.Company name Nanjing Agricultural University.</div>
<!-- Javascript -->
<script src="/js/jquery.min.js"></script>
<script src="/js/bootstrap.min.js"></script>
<script src="/js/jquery.backstretch.min.js"></script>
<script src="assets/register/js/scripts.js"></script>
</body>
</html>