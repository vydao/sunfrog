<?php
return [
    'vendorPath' => dirname(dirname(__DIR__)) . '/vendor',
    'components' => [
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
