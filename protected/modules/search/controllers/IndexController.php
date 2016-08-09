<?php
class IndexController extends Controller{
	public $array = array(
		'info' => array(
			'school' => '南京农业大学',
			'phone' => '18551402662',
			'qq' => '861086110',
			'grade'=>'计算机',
			'class'=>'计科122',
		),
		'baseInfo'=> array(
			'name' => '梁峰',
			'age' => 22,
			'sex' => '男',
			'height'=>'175cm',
		),
	);
	public $layout = '/layouts/main';
	public function actionIndex(){
		/* $sql = 'select * from per_info';
		$command = Yii::app()->db_yii->createCommand($sql);
		$re = $command->query();
		foreach ($re as $row){
			var_dump($row);
		}
		$this->render("index",$this->array); */
		echo $_SERVER['HTTP_HOST'].'<br>';
		echo substr($_SERVER['HTTP_HOST'],0,strpos($_SERVER['HTTP_HOST'],'.'));
	}
}