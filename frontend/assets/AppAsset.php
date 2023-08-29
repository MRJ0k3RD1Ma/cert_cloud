<?php

namespace frontend\assets;

use yii\web\AssetBundle;

/**
 * Main frontend application asset bundle.
 */
class AppAsset extends AssetBundle
{
    public $basePath = '@webroot';
    public $baseUrl = '@web/frt';
    public $css = [
        'css/bootstrap.css',
        'css/site.css',
        'css/style.css',
        'sweetalert2/sweetalert2.min.css',
    ];
    public $js = [
        'js/select2.full.min.js',
        'js/jquery.input.js',
        'sweetalert2/sweetalert2.min.js',
    ];
    public $depends = [
        'yii\web\YiiAsset',
//        'yii\bootstrap\BootstrapAsset',
    ];
}
