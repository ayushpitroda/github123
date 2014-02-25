<?php

// uncomment the following to define a path alias
// Yii::setPathOfAlias('local','path/to/local-folder');

// This is the main Web application configuration. Any writable
// CWebApplication properties can be configured here.

require_once( dirname(__FILE__) . '/../components/helpers.php');

return array(
	'basePath'=>dirname(__FILE__).DIRECTORY_SEPARATOR.'..',
	'name'=>'ETS',
	'theme'=>'hebo',

	// preloading 'log' component
	'preload'=>array('log', 'bootstrap'),

	// autoloading model and component classes
	'import'=>array(
		'application.models.*',
		'application.components.*',
		'application.components.EButtonColumnWithClearFilters.*',
		'application.components.RolesEButtonColumnWithClearFilters.*',
		'application.components.RightsEButtonColumnWithClearFilters.*',
		'application.components.UsersEButtonColumnWithClearFilters.*',
		'application.components.ProjectsEButtonColumnWithClearFilters.*',
		'application.components.PagesEButtonColumnWithClearFilters.*',
        'ext.apiAuth.components.*',

		),

	'modules'=>array(
		// uncomment the following to enable the Gii tool
		
		'gii'=>array(
			'class'=>'system.gii.GiiModule',
			'password'=>'admin',
			'generatorPaths' => array(
            'bootstrap.gii'
                ),
			// If removed, Gii defaults to localhost only. Edit carefully to taste.
			'ipFilters'=>array('124.123.81.109','192.168.0.121','124.123.97.181','198.91.163.21','::1'),
		),
		
	  'user' => array(
			'debug' => true,
			)

	),

	// application components
	'components'=>array(
		'user'=>array(
			// enable cookie-based authentication
			'allowAutoLogin'=>true,
		),
		
		/*'user'=>array(
        'class' => 'application.modules.user.components.YumWebUser',
        'allowAutoLogin'=>true,
        'loginUrl' => array('//user/user/login'),
          ),*/
    
		'bootstrap' => array(
	    'class' => 'ext.bootstrap.components.Bootstrap',
	    'responsiveCss' => true,
	       ),
		'email'=>array(
        'class'=>'application.extensions.email.Email',
        'delivery'=>'php', //Will use the php mailing function.  
        //May also be set to 'debug' to instead dump the contents of the email into the view
        ),  
		// uncomment the following to enable URLs in path-format
		
		
		/*
		'urlManager'=>array(
			'urlFormat'=>'path',
			'rules'=>array(
				'<controller:\w+>/<id:\d+>'=>'<controller>/view',
				'<controller:\w+>/<action:\w+>/<id:\d+>'=>'<controller>/<action>',
				'<controller:\w+>/<action:\w+>'=>'<controller>/<action>',
			),
		),
		*/
		
        /*
		'db'=>array(
			'connectionString' => 'sqlite:'.dirname(__FILE__).'/../data/testdrive.db',
		),
         */
		// uncomment the following to use a MySQL database
		'db'=>array(
			'connectionString' => 'mysql:host=localhost;dbname=tnt_ets',
			'emulatePrepare' => true,
			'username' => 'root',
			'password' => '',
			'charset' => 'utf8',
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

		
        'ePdf' => array(
            'class'         => 'ext.yii-pdf.EYiiPdf',
            'params'        => array(
                'mpdf'     => array(
                    'librarySourcePath' => 'application.vendors.mPdf.*',
                    'constants'         => array(
                        '_MPDF_TEMP_PATH' => Yii::getPathOfAlias('application.runtime'),
                    ),
                    'class'=>'mpdf', // the literal class filename to be loaded from the vendors folder
                    /*'defaultParams'     => array( // More info: http://mpdf1.com/manual/index.php?tid=184
                        'mode'              => '', //  This parameter specifies the mode of the new document.
                        'format'            => 'A4', // format A4, A5, ...
                        'default_font_size' => 0, // Sets the default document font size in points (pt)
                        'default_font'      => '', // Sets the default font-family for the new document.
                        'mgl'               => 15, // margin_left. Sets the page margins for the new document.
                        'mgr'               => 15, // margin_right
                        'mgt'               => 16, // margin_top
                        'mgb'               => 16, // margin_bottom
                        'mgh'               => 9, // margin_header
                        'mgf'               => 9, // margin_footer
                        'orientation'       => 'P', // landscape or portrait orientation
                    )*/
                ),
                'HTML2PDF' => array(
                    'librarySourcePath' => 'application.vendors.html2pdf.*',
                    'classFile'         => 'html2pdf.class.php', // For adding to Yii::$classMap
                    /*'defaultParams'     => array( // More info: http://wiki.spipu.net/doku.php?id=html2pdf:en:v4:accueil
                        'orientation' => 'P', // landscape or portrait orientation
                        'format'      => 'A4', // format A4, A5, ...
                        'language'    => 'en', // language: fr, en, it ...
                        'unicode'     => true, // TRUE means clustering the input text IS unicode (default = true)
                        'encoding'    => 'UTF-8', // charset encoding; Default is UTF-8
                        'marges'      => array(5, 5, 5, 8), // margins by default, in order (left, top, right, bottom)
                    )*/
                ),
            ),
        ),
        'apiAuth' => array(
            'class' => 'ext.apiAuth.ApiAuth',
                'realm' => 'API',                     //optional
                'protocol' => 'basic',                           //optional: 'basic' or 'digest' (recommended)
                'userClass' => 'Users',                              //required
                'userIdAttribute' => 'id',                          //required
                'usernameAttribute' => 'username',                  //required, will be used for authentication, unless apiAuthUsernameAttribute is set.
                'passwordAttribute' => 'password',                  //required, will be used for authentication, unless apiAuthPasswordAttribute is set.
        ),
    ),

	// application-level parameters that can be accessed
	// using Yii::app()->params['paramName']
	'params'=>array(
		// this is used in contact page
		'adminEmail'=>'webmaster@example.com',
        'imagesDir'=> '/images/uploads',
	),
);


