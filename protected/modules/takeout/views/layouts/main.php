<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <title>校园订餐系统----首页</title>
    <link href="<?php echo DOMAIN_NAME; ?>/css/bootstrap.min.css" rel="stylesheet">
    <link href="<?php echo DOMAIN_NAME; ?>/css/font-awesome.min.css" rel="stylesheet">
    <link href="<?php echo DOMAIN_NAME; ?>/css/animate.min.css" rel="stylesheet">
    <link href="<?php echo DOMAIN_NAME; ?>/css/responsive.css" rel="stylesheet">
    <link href="<?php echo DOMAIN_NAME; ?>/css/main.css" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="assets/takeout/css/basic.css"/>
    <script src="js/jquery.min.js"></script>
</head>
<body>
<?php
    $headerData = Yii::app()->params['headerMainConfig'];
    $headerData['active'] = '生活应用';
    $this->widget('application.widgets.HeaderMainWidget',array('headerData'=>$headerData));
?>



<?php echo $content; ?>

<?php $this->widget('application.widgets.FooterMainWidget'); ?>
</body>
</html>
