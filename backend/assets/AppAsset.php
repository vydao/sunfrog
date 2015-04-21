<?php
/**
 * @link http://www.yiiframework.com/
 * @copyright Copyright (c) 2008 Yii Software LLC
 * @license http://www.yiiframework.com/license/
 */

namespace backend\assets;

use yii\web\AssetBundle;

/**
 * @author Qiang Xue <qiang.xue@gmail.com>
 * @since 2.0
 */
class AppAsset extends AssetBundle
{
    public $basePath = '@webroot';
    public $baseUrl = '@web';
    public $css = [
        'css/site.css',
        'css/sb-admin-2.css',
        'css/timeline.css',
        'css/metisMenu.css',
        'css/font-awesome-4.3.0/css/font-awesome.min.css',
    ];
    public $js = [
        'js/jquery.min.js',
        'js/tinymce/tinymce.min.js',
        'js/sb-admin-2.js',
        'js/metisMenu.js',
        'js/admin.js',
    ];
    public $depends = [
        'yii\web\YiiAsset',
        'yii\bootstrap\BootstrapAsset',
    ];
}
