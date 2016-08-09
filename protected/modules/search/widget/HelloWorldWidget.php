<?php

class HelloWorldWidget extends CWidget{
	public $info = array();
	public $baseInfo = array();
	function init(){
		
	}
	function run(){
		
		
		
		
		return $this->render('hello-world',array('info'=>$this->info,'baseInfo'=>$this->baseInfo));
	}
}

