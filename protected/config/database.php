<?php

// This is the database connection configuration.
return array(
	//'connectionString' => 'sqlite:'.dirname(__FILE__).'/../data/testdrive.db',
	// uncomment the following lines to use a MySQL database
   /*
	*	'emulatePrepare' => true,
	*	'username' => 'root',
	*	'password' => '',
	*	'charset' => 'utf8',
	*/
	//本地连接数据库
    'class' => 'CDbConnection',
	'connectionString' => 'mysql:host=localhost;dbname=mobile',
	'username' => 'root',
	'password' => '123456',
	'charset' => 'utf8',
	'emulatePrepare' => true,
//阿里云数据库
//	'class' => 'CDbConnection',
//	'connectionString' => 'mysql:host=120.27.96.110;dbname=school',
//	'username' => 'root',
//	'password' => 'liangfeng0302.',
//	'charset' => 'utf8',
//	'emulatePrepare' => true,

);
