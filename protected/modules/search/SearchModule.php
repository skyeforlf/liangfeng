<?php
class SearchModule extends CWebModule{
	public function init(){
		$this->setImport(array(
			'search.models.*',
			'search.controllers.*',
		));
	}
	public function beforeControllerAtion($controller,$action){
		if(parent::beforeControllerAction($controller,$action)){
			return true;
		}else{
			return false;
		}
	}
}