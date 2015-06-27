<?php
return [
    'vendorPath' => dirname(dirname(__DIR__)) . '/vendor',
    'components' => [
		'db' => [
            'class' => 'yii\db\Connection',
            'dsn' => 'mysql:host=localhost;dbname=sunfrog',
            'username' => 'sunfrog',
            'password' => 'SuNfroG#2015',
            'charset' => 'utf8',
        ],
        'request' => [
            'enableCsrfValidation' => false 
        ],
        'cache' => [
            'class' => 'yii\caching\FileCache',
        ],
    ],
    'aliases' => [
        'uploadPath' => dirname(dirname(__DIR__)) . '/uploads',
    ],
];
