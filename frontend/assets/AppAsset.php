<?php
/**
 * @link http://www.yiiframework.com/
 * @copyright Copyright (c) 2008 Yii Software LLC
 * @license http://www.yiiframework.com/license/
 */

namespace frontend\assets;

use yii\web\AssetBundle;

/**
 * @author Qiang Xue <qiang.xue@gmail.com>
 * @since 2.0
 */
class AppAsset extends AssetBundle
{
    public $basePath = '@webroot';
    public $baseUrl = '@web/frontend/web/';
    public $css = [
        'css/font-awesome-4.3.0/css/font-awesome.min.css',
        'css/bootstrapCustom.css',
        'css/bxslider.css',
        'css/bxslider.css',
        'css/bootstrap-social.css',
        'css/cd.css',
        'css/bootstrap.min.css',
        'css/complete.min.css'
    ];
    public $js = [
        'js/jquery.min.js',
        'js/bootstrap.min.js',
        'js/jquery.lazyload.js',
        'js/jquery.bxslider.js',
        'js/cd.plugin.js',
        'js/cd.js',
        'js/sunFrog.min.js',
        'js/main.js'
    ];
    public $depends = [
        'yii\web\YiiAsset',
        'yii\bootstrap\BootstrapAsset',
    ];
}
