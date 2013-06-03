<?php

// uncomment the following to define a path alias
// Yii::setPathOfAlias('local','path/to/local-folder');

// This is the main Web application configuration. Any writable
// CWebApplication properties can be configured here.
return array(
'basePath'=>dirname(__FILE__).DIRECTORY_SEPARATOR.'..',
'name'=>'Gestión de matrícula',
// preloading 'log' component
'preload'=>array(
'log',
'bootstrap',
),
'language'=>'es',
'sourceLanguage'=>'00',
'defaultController'=>'user/login/',
// autoloading model and component classes
'import'=>array(
'application.models.*',
'application.components.*',
'application.controllers.*',	
            'application.modules.user.models.*',
            'application.modules.user.components.*',
     //'application.modules.user.models. *',
     'ext.giix-components.*', // giix components
            'ext.fileimagebehavior.*'
),
    
'modules'=>array(
// uncomment the following to enable the Gii tool

'gii'=>array(
'class'=>'system.gii.GiiModule',
'password'=>'admin',
// If removed, Gii defaults to localhost only. Edit carefully to taste.
'ipFilters'=>array('200.6.117.145','127.0.0.1','::1'),
'generatorPaths' => array(
                   'ext.giix-core', // giix generators
             ),
/*'generatorPaths'=>array(
'bootstrap.gii',
),*/
),
/*'mailbox'=>
array(
'userClass' => 'User',
'userIdColumn' => 'id',
'usernameColumn' => 'username',
),*/
'user'=>array(
                # encrypting method (php hash function)
                'hash' => 'md5',

                # send activation email
                'sendActivationMail' => true,

                # allow access for non-activated users
                'loginNotActiv' => false,

                # activate user on registration (only sendActivationMail = false)
                'activeAfterRegister' => false,

                # automatically login from registration
                'autoLogin' => true,

                # registration path
                # 'registrationUrl' => array('/user/registration'),

                # recovery password path
                #'recoveryUrl' => array('/user/recovery'),

                # login form path
                'loginUrl' => array('/user/login'),

                # page after login
                'returnUrl' => array('/site'),

                # page after logout
                'returnLogoutUrl' => array('/'),
            ),	

),

// application components
'components'=>array(
'bootstrap'=>array(
            'class'=>'ext.bootstrap.components.Bootstrap', // assuming you extracted bootstrap under extensions
         ),
         'coreMessages'=>array(
            'basePath'=>null,
        ),
/*'user'=>array(
// enable cookie-based authentication
'allowAutoLogin'=>true,
),*/
'user'=>array(
                // enable cookie-based authentication
                'class' => 'WebUser',
                'allowAutoLogin'=>true,
                'loginUrl' => array('/user/login'),

            ),
			//'cache' => array ('class' => 'system.caching.CDummyCache'),
		// uncomment the following to enable URLs in path-format
		
		'urlManager'=>array(
			'urlFormat'=>'path',
			'showScriptName'=>false,
			'rules'=>array(
				'<controller:\w+>/<id:\d+>'=>'<controller>/view',
				'<controller:\w+>/<action:\w+>/<id:\d+>'=>'<controller>/<action>',
				'<controller:\w+>/<action:\w+>'=>'<controller>/<action>',
			),
		),
		
		/*'db'=>array(
			'connectionString' => 'sqlite:'.dirname(__FILE__).'/../data/testdrive.db',
		),*/
		// uncomment the following to use a MySQL database
		
		'db'=>array(
			'connectionString' => 'mysql:host=localhost;dbname=trotws_aplibre',
			'tablePrefix' => '',
			'emulatePrepare' => true,
			'username' => 'root',
			'password' => 'root',		
			'charset' => 'utf8',
		),
		'authManager'=>array(
            'class'=>'CDbAuthManager',
            'connectionID'=>'db',
            //'itemTable'=>'AuthItem', // Tabla que contiene los elementos de autorizacion
            //'itemChildTable'=>'AuthItemChild', // Tabla que contiene los elementos padre-hijo
            //'assignmentTable'=>'AuthAssignment', // Tabla que contiene la signacion usuario-autorizacion
        ),

'errorHandler'=>array(
// use 'site/error' action to display errors
'errorAction'=>'site/error',
),
'log'=>array(
'class'=>'CLogRouter',
'routes'=>array(
/*array(
'class'=>'CFileLogRoute',
'levels'=>'error, warning',
),*/
// uncomment the following to show log messages on web pages

/*array(
'class'=>'CWebLogRoute',
),*/

),
),
),

// application-level parameters that can be accessed
// using Yii::app()->params['paramName']
'params'=>array(
// this is used in contact page
'adminEmail'=>'marcelo.ceballos@tide.cl',
),



);