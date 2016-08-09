<?php
/* @var $this SiteController */
/* @var $error array */


$this->breadcrumbs=array(
	'Error',
);
?>

<h2>Error <?php echo '标记2'.$code; ?></h2>

<div class="error">
<?php echo '标记3'.CHtml::encode($message); ?>
</div>