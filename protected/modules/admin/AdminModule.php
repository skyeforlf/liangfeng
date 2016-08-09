<?php
class AdminModule extends CWebModule{
	public function init(){
		$this->setImport(array(
			'admin.models.*',
			'admin.controllers.*',
            'admin.dal.dao.*',
            'admin.config.*',
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
