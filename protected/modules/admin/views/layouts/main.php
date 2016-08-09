<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>chinaz</title>
    <link href="<?php echo DOMAIN_NAME; ?>/css/bootstrap.min.css" rel="stylesheet">
    <link href="<?php echo DOMAIN_NAME; ?>/css/font-awesome.min.css" rel="stylesheet">
    <link href="<?php echo DOMAIN_NAME; ?>/css/animate.min.css" rel="stylesheet">
    <link href="<?php echo DOMAIN_NAME; ?>/css/responsive.css" rel="stylesheet">
    <link href="<?php echo DOMAIN_NAME; ?>/css/main.css" rel="stylesheet">
    <link href="assets/admin/css/basic.css" rel="stylesheet" />
    <link href="assets/admin/css/custom.css" rel="stylesheet" />
    <link href="<?php echo DOMAIN_NAME; ?>/css/jquery.Jcrop.css" rel="stylesheet" />
    <script src="js/jquery.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
</head>
<body>
<?php
    $headerData = Yii::app()->params['headerMainConfig'];
    $headerData['active'] = '个人中心';
    $this->widget('application.widgets.HeaderMainWidget',array('headerData'=>$headerData));
?>

<div id="wrapper">
    <?php $this->widget('admin.widgets.AdminNavWidget');?>

<?php echo $content;?>

<!-- /. PAGE WRAPPER  -->
</div>
<?php $this->widget('application.widgets.FooterMainWidget'); ?>

<!-- METISMENU SCRIPTS -->
<script src="assets/admin/js/jquery.metisMenu.js"></script>
<!-- CUSTOM SCRIPTS -->
<script src="assets/admin/js/custom.js"></script>



</body>
</html>
