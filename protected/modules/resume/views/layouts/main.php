<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=Edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="keywords" content="">
    <meta name="description" content="">
    <title></title>
    <!-- stylesheet css -->
    <link href="<?php echo DOMAIN_NAME; ?>/css/bootstrap.min.css" rel="stylesheet">
    <link href="<?php echo DOMAIN_NAME; ?>/css/font-awesome.min.css" rel="stylesheet">
    <link href="<?php echo DOMAIN_NAME; ?>/css/main.css" rel="stylesheet">
    <link href="<?php echo DOMAIN_NAME; ?>/css/animate.min.css" rel="stylesheet">
    <link href="<?php echo DOMAIN_NAME; ?>/css/responsive.css" rel="stylesheet">
    <link rel="stylesheet" href="/assets/resume/css/resume-green.css"/>
</head>
<body data-spy="scroll" data-target=".navbar-collapse">
<?php
$headerData = Yii::app()->params['headerMainConfig'];
$headerData['active'] = '生活应用';
$this->widget('application.widgets.HeaderMainWidget',array('headerData'=>$headerData));
?>
<?php echo $content; ?>
<div class="clearfix"></div>
<?php $this->widget('application.widgets.FooterMainWidget'); ?>
<!-- javascript js -->
<script src="js/jquery.min.js"></script>
<script src="js/bootstrap.min.js"></script>
<script src="js/wow.min.js"></script><?php //控制滑动显示的  ?>
<script src="assets/resume/js/jquery.backstretch.min.js"></script>
<script src="assets/resume/js/custom.js"></script>

</body>
</html>
