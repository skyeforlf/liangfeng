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
	<link rel="stylesheet" href="/assets/login/css/style.css">
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
			<form action="/index.php?r=login/index&action=login" method="post" class="form-horizontal">
				<div class="app-cam">
					<div class="form-error"></div>
					<div class="form-group">
						<div class="input-group">
							<span class="input-group-addon"><span class="glyphicon glyphicon-user"></span></span>
							<input type="text" name="idNumber" class="text form-control input-lg" placeholder="账号:QQ号、手机号、学号">
						</div>
					</div>
					<div class="form-group">
						<div class="input-group">
							<span class="input-group-addon"><span class="glyphicon glyphicon-lock"></span></span>
							<input type="password" name="password" class="form-control input-lg" placeholder="密码">
						</div>

					</div>

					<div class="submit"><input type="submit" onclick="myFunction()" value="用户登陆" ></div>
					<div class="clear"></div>
					<div class="buttons">
						<ul>
							<li><a href="<?php echo DOMAIN_NAME.'/index.php?r=register/index'?>" class="hvr-sweep-to-right">立即注册</a></li>
							<div class="clear"></div>
						</ul>
					</div>
				</div>
			</form>
		</div>
	</div>

</div>
<div align="center">Copyright &copy; 2016.Company name Nanjing Agricultural University.</div>
</body>
</html>