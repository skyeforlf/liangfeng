<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">
    <title><?php echo CHtml::encode(Yii::app()->name); ?></title>
	
	<!-- core CSS -->
    <link href="<?php echo DOMAIN_NAME; ?>/css/bootstrap.min.css" rel="stylesheet">
    <link href="<?php echo DOMAIN_NAME; ?>/css/font-awesome.min.css" rel="stylesheet">
    <link href="<?php echo DOMAIN_NAME; ?>/css/animate.min.css" rel="stylesheet">
    <link href="<?php echo DOMAIN_NAME; ?>/css/prettyPhoto.css" rel="stylesheet">
    <link href="<?php echo DOMAIN_NAME; ?>/css/main.css" rel="stylesheet">
    <link href="<?php echo DOMAIN_NAME; ?>/css/responsive.css" rel="stylesheet">
    <!--[if lt IE 9]>
    <script src="/js/html5shiv.js"></script>
    <script src="/js/respond.min.js"></script>
    <![endif]-->       
    <link rel="shortcut icon" href="images/ico/favicon.ico">
    <link rel="apple-touch-icon-precomposed" sizes="144x144" href="images/ico/apple-touch-icon-144-precomposed.png">
    <link rel="apple-touch-icon-precomposed" sizes="114x114" href="images/ico/apple-touch-icon-114-precomposed.png">
    <link rel="apple-touch-icon-precomposed" sizes="72x72" href="images/ico/apple-touch-icon-72-precomposed.png">
    <link rel="apple-touch-icon-precomposed" href="images/ico/apple-touch-icon-57-precomposed.png">
</head><!--/head-->

<body class="homepage">
<?php
    $headerData = Yii::app()->params['headerMainConfig'];
    $headerData['active'] = '首页';
    $this->widget('application.widgets.HeaderMainWidget',array('headerData'=>$headerData));
?>
<!-- -------------------内容开始----------------- -->

	<?php echo $content; ?>
	
<!-- -------------------内容结束----------------- -->
<?php $this->widget('application.widgets.FooterMainWidget'); ?>

    <script src="js/jquery.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/jquery.isotope.min.js"></script>
    <script src="js/jquery.prettyPhoto.js"></script>
    <script src="js/main.js"></script>
    <script src="js/wow.min.js"></script><?php //控制滑动显示的  ?>
</body>
</html>
