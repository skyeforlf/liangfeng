<!doctype html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width,initial-scale=1">
	<link rel="stylesheet" href="/assets/blog/css/blog.css"/>
    <link href="<?php echo DOMAIN_NAME; ?>/css/bootstrap.min.css" rel="stylesheet">
	<link href="<?php echo DOMAIN_NAME; ?>/css/font-awesome.min.css" rel="stylesheet">
    <link href="<?php echo DOMAIN_NAME; ?>/css/animate.min.css" rel="stylesheet">
    <link href="<?php echo DOMAIN_NAME; ?>/css/responsive.css" rel="stylesheet">
    <link href="<?php echo DOMAIN_NAME; ?>/css/main.css" rel="stylesheet">
	<script src="/js/jquery.min.js"></script>
	<script src="/assets/blog/js/blog.js"></script>
	<title>Blog博客</title>
</head>
<body>
<?php
    $headerData = Yii::app()->params['headerMainConfig'];
    $headerData['active'] = '博客';
    $this->widget('application.widgets.HeaderMainWidget',array('headerData'=>$headerData));
?>
<div class="container-fluid blog-body">
	<?php $this->widget('blog.widgets.LeftNavWidget'); ?>
<!-- header -->


	<div class="blog-center">

		<?php echo $content;?>

	</div>


<!-- footer-->
	<div class="clearfix"></div>
</div>
<?php $this->widget('application.widgets.FooterMainWidget'); ?>
<script src="js/jquery.min.js"></script>
<script src="js/bootstrap.min.js"></script>
</body>
</html>
