<?php
require dirname(__FILE__) . '/constants.php';
// uncomment the following to define a path alias
// Yii::setPathOfAlias('local','path/to/local-folder');

// This is the main Web application configuration. Any writable
// CWebApplication properties can be configured here.
return array(
	'basePath'=>dirname(__FILE__).DIRECTORY_SEPARATOR.'..',
	'name'=>'毕业设计--校园',

	// preloading 'log' component
	'preload'=>array('log'),
	// autoloading model and component classes
	'import'=>array(
		'application.models.*',
		'application.components.*',
		'application.dal.dao.*',
		'application.dal.iao.*'
	),

	'modules'=>array(
		// uncomment the following to enable the Gii tool
		/*'gii'=>array(
			'class'=>'system.gii.GiiModule',
			'password'=>'liangfeng',
			// If removed, Gii defaults to localhost only. Edit carefully to taste.
			'ipFilters'=>array('127.0.0.1','::1'),
		),*/
		'takeout',
		'forum',
		'search',
		'blog',
        'resume',
        'admin'
	),
	// application components
	'components'=>array(

		'user'=>array(
			// enable cookie-based authentication
			'allowAutoLogin'=>true,
		),
        'memcache'=>array(
            'class'=>"CMemCache",
            'servers'=>array(
                array('host'=>'127.0.0.1','port'=>'11211','weight'=>40),
            ),
        ),
		// uncomment the following to enable URLs in path-format

		/*'urlManager'=>array(
			'urlFormat'=>'path',
			'showScriptName'=>false,     // false不需要引号
			'urlSuffix'=>'.html',
			'rules'=>array(
				'<controller:\w+>/<id:\d+>'=>'<controller>/view',
				'<controller:\w+>/<action:\w+>/<id:\d+>'=>'<controller>/<action>',
				'<controller:\w+>/<action:\w+>'=>'<controller>/<action>',
			),
		),*/

		// database settings are configured in database.php
		'db'=>require(dirname(__FILE__).'/database.php'),
		'dbcms'=>array(
			'class' => 'CDbConnection',
			'connectionString' => 'mysql:host=10.10.30.142;dbname=d_cms',
			'username' => 'd_cmstest',
			'password' => 'tuniu520',
			'charset' => 'utf8',
			'emulatePrepare' => true,
		),
		'errorHandler'=>array(
			// use 'site/error' action to display errors
			'errorAction'=>'site/error',
		),

		'log'=>array(
			'class'=>'CLogRouter',
			'routes'=>array(
				array(
					'class'=>'CFileLogRoute',
					'levels'=>'error, warning',
				),
				// uncomment the following to show log messages on web pages
				/*
				array(
					'class'=>'CWebLogRoute',
				),
				*/
			),
		),

	),

	// application-level parameters that can be accessed
	// using Yii::app()->params['paramName']
	'params'=>array(
		// this is used in contact page
		'adminEmail'=>'webmaster@example.com',
        'headerMainConfig'=>require(dirname(__FILE__).'/headerMainConfig.php'),
	),
);
