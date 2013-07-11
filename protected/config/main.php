<?php

// uncomment the following to define a path alias
// Yii::setPathOfAlias('local','path/to/local-folder');

// This is the main Web application configuration. Any writable
// CWebApplication properties can be configured here.
return array(
	'basePath'=>dirname(__FILE__).DIRECTORY_SEPARATOR.'..',
	'name'=>'Sharovik CMS',
    'language' => 'ru',
    'charset'=>'utf-8',
	// preloading 'log' component
	'preload'=>array('log'),

	// autoloading model and component classes
	'import'=>array(
		'application.models.*',
		'application.components.*',
        'application.helpers.*',
        'application.vendors.*',
        'application.modules.user.models.*',
        'application.modules.user.components.*',
        'application.modules.admin.*',
        'application.modules.shop.extensions.shoppingCart.*',
        'ext.YiiMailer.YiiMailer',
	),

	'modules'=>array(
        'user'=>array(
            # encrypting method (php hash function)
            'hash' => 'md5',

            # send activation email
            'sendActivationMail' => false,

            # allow access for non-activated users
            'loginNotActiv' => false,

            # activate user on registration (only sendActivationMail = false)
            'activeAfterRegister' => false,

            # automatically login from registration
            'autoLogin' => true,

            # registration path
            'registrationUrl' => array('/user/registration'),

            # recovery password path
            'recoveryUrl' => array('/user/recovery'),

            # login form path
            'loginUrl' => array('/user/login'),

            # page after login
            'returnUrl' => array('/user/profile'),

            # page after logout
            'returnLogoutUrl' => array('/user/login'),
        ),
        #...

		// uncomment the following to enable the Gii tool
		'gii'=>array(
			'class'=>'system.gii.GiiModule',
			'password'=>'1',
			// If removed, Gii defaults to localhost only. Edit carefully to taste.
			'ipFilters'=>array('127.0.0.1','::1'),
		),

        'admin',
        'shop',
        'gallery',
        'events',
        'lunch',

	),

	// application components
	'components'=>array(
        'user'=>array(
            // enable cookie-based authentication
            'class' => 'WebUser',
            'allowAutoLogin'=>true,
            'loginUrl' => array('/user/login'),
        ),

        'shoppingCart' =>
        array(
            'class' => 'application.modules.shop.extensions.shoppingCart.EShoppingCart',
        ),

		// uncomment the following to enable URLs in path-format

        'simpleImage'=>array(
            'class' => 'application.extensions.simpleImage.CSimpleImage',
        ),

		'urlManager'=>array(
			'urlFormat'=>'path',
            'baseUrl' => 'http://comfort.local',
			'rules'=>array(
                '<controller:\w+>/index'=>'<controller>/index',
                '/shop/admin'=>'shop/admin/index',
                '/contacts' => 'site/contact',
                '/login' => '/user/login',
                'admin/'=>'admin/default',
                'gallery/'=>'gallery/default',
                'events/'=>'events/default',
                'lunch/'=>'lunch/default',
                'shop/category/<id:1>/<alias:.*?>'=>'shop/',
                'shop/product/<id:\d+>/<alias:.*?>'=>'shop/product/view',
                'shop/product/<alias_url:.*?>'=>'shop/product/view',
                'shop/product/<id:\d+>'=>'shop/product/view',
                'shop/category/<id:\d+>/<alias:.*?>'=>'shop/category/view',
                'shop/category/<alias_url:.*?>'=>'shop/category/view',
                'shop/category/<id:\d+>'=>'shop/category/view',
                'shop/'=>'shop/default',
                'gallery/album/<id:\d+>/<alias:.*?>'=>'gallery/album/view',
                'page/<id:\d+>/<alias:.*?>'=>'page/view',
                'page/<alias_url:.*?>'=>'page/view',
                'news/blog/<id:\d+>/<alias:.*?>'=>'news/blog',
                'news/<id:\d+>/<alias:.*?>'=>'news/view',
                'news/<alias_url:.*?>'=>'news/view',
                'news/'=>'news/index',
                '<alias_url:\w+>'=>'page/view',
				'<controller:\w+>/<id:\d+>'=>'<controller>/view',
                '<module:\w+>/<controller:\w+>/<action:\w+>/<id:\d+>'=>'<module>/<controller>/<action>',
				'<controller:\w+>/<action:\w+>/<id:\d+>'=>'<controller>/<action>',
				'<controller:\w+>/<action:\w+>'=>'<controller>/<action>',
			),
		),



		'db'=>array(
                            'connectionString' => 'mysql:host=localhost;dbname=comfort',
                            'emulatePrepare' => true,
                            'username' => 'root',
                            'password' => '',
                            'charset' => 'utf8',
                            'tablePrefix' => 'tbl_',
                            'schemaCachingDuration' => YII_DEBUG ? 0 : 3600,
                    ),

        'cache'=>array(
            'class'=>'CFileCache',
            //'class'=>'CApcCache',
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
        'YiiMailer' => array(),
        'meta_description' => 'Сайт компании',
        'meta_keywords' => 'компания, cms',
		'adminEmail'=>'webmaster@example.com',
        'newsPerPage'=>5,
        'redactor' => array(
                'allowedTags' => array("code", "span", "div", "label", "a", "br", "p", "b", "i", "del", "strike", "u",
                                        "img", "video", "audio", "iframe", "object", "embed", "param", "blockquote",
                                        "mark", "cite", "small", "ul", "ol", "li", "hr", "dl", "dt", "dd", "sup", "sub",
                                        "big", "pre", "code", "figure", "figcaption", "strong", "em", "table", "tr", "td",
                                        "th", "tbody", "thead", "tfoot", "h1", "h2", "h3", "h4", "h5", "h6", "center"),
                'convertDivs' => false

        ),
        'nophoto' => '/images/nophoto.png',
	),
);