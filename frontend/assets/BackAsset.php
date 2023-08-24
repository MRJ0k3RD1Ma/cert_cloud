<?php

namespace frontend\assets;

use yii\web\AssetBundle;

/**
 * Main frontend application asset bundle.
 */
class BackAsset extends AssetBundle
{
    public $basePath = '@webroot';
    public $baseUrl = '@web/design';
    public $css = [
        'https://fonts.googleapis.com/css?family=Muli:300,300i,400,400i,600,600i,700,700i|Comfortaa:300,400,500,700',
        'app-assets/css/vendors.css',
        'app-assets/css/app.css',
        'app-assets/css/core/menu/menu-types/vertical-compact-menu.css',
        'app-assets/vendors/css/cryptocoins/cryptocoins.css',
        'app-assets/css/pages/timeline.css',
//        'app-assets/css/pages/dashboard-ico.css',
        'assets/css/style.css',
    ];
    public $js = [
        'app-assets/vendors/js/vendors.min.js',
        'app-assets/vendors/js/timeline/horizontal-timeline.js',
        'app-assets/js/core/app-menu.js',
        'app-assets/js/core/app.js',
//        'app-assets/js/scripts/pages/dashboard-ico.js',
    ];
    public $depends = [
        'yii\web\YiiAsset',
        'yii\bootstrap5\BootstrapAsset',
    ];
}
