<?php
class ResumeModule extends CWebModule{
	public function init(){
		$this->setImport(array(
			'resume.models.*',
			'resume.controllers.*',
            'resume.dal.dao.*',
            'resume.config.*'
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
