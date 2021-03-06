<?php
$params = array_merge(
    require(__DIR__ . '/../../common/config/params.php'),
    require(__DIR__ . '/../../common/config/params-local.php'),
    require(__DIR__ . '/params.php'),
    require(__DIR__ . '/params-local.php')
);

return [
    'id' => 'app-frontend',
    'basePath' => dirname(__DIR__),
    'bootstrap' => ['log'],
    'controllerNamespace' => 'frontend\controllers',
    'components' => [
        'user' => [
            'identityClass' => 'common\models\User',
            'enableAutoLogin' => true,
        ],
        'log' => [
            'traceLevel' => YII_DEBUG ? 3 : 0,
            'targets' => [
                [
                    'class' => 'yii\log\FileTarget',
                    'levels' => ['error', 'warning'],
                ],
            ],
        ],
        'errorHandler' => [
            'errorAction' => 'site/error',
        ],
        'assetManager' => [
            'bundles' => [
                'yii\bootstrap\BootstrapPluginAsset' => [
                    'js'=>[]
                ],
                'yii\bootstrap\BootstrapAsset' => [
                    'css' => [],
                ],

            ],
        ],
        'urlManager'=> [
	        'class'	=> 'yii\web\UrlManager',
	        'enablePrettyUrl' => true,
            'showScriptName' => false,
            'enableStrictParsing' => false,
			'rules' => [
                'home' => '/site/index',
                'about' => '/site/about',
                'contact' => '/site/contact',
                'detail/<id:\d+>' => '/site/detail',
                'category/<id:\d+>' => '/site/category',
        		'search' => '/site/search',

				'<controller:\w+>/<id:\d+>'	=> '<controller>/view',
				'<controller:\w+>/<action:\w+>/<id:\d+>'	=> '<controller>/<action>',
				'<controller:\w+>/<action:\w+>'	=> '<controller>/<action>',
        		'news/<name>-<id:\d+>'=> 'news/view',
        		'support/<name>-<id:\d+>'=> 'support/view',
			],
		],
    ],
    'params' => $params,
];
