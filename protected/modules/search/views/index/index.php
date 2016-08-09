<?php
/**
 * 
 * User Liang Feng
 * 
 * 
 * 
 * 
 */

?>
<div class="row">  
	<?php 
	$this->widget('zii.widgets.jui.CJuiDatePicker', array(
	        'attribute' => 'p_title',  
	      //  'model'=>$model,  
	        'value'=>'aaaa',//设置默认值
	        'name'=>'date',  
	        'options' => array(  
	        'showAnim' => 'fold',  
	        'dateFormat' => 'yy-mm-dd')	
		)
	);
	?>
</div> 
<div class="nav">
	<?php $this->widget('search.widget.HelloWorldWidget',array('info'=>$this->array['info'],'baseInfo'=>$this->array['baseInfo'])); ?>
</div>