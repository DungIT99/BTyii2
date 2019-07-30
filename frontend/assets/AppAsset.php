<?php

namespace frontend\assets;

use yii\web\AssetBundle;

/**
 * Main frontend application asset bundle.
 */
class AppAsset extends AssetBundle
{
    public $basePath = '@webroot';
    public $baseUrl = '@web';
    public $css = [
'css/site.css',
'css/jquery-ui.css'
    ];
    public $js = [
        'vendor/jquery/jquery-3.2.1.min.js',
        'js/jquery-ui.js',
        'js/picker.js'
    ];
    public $depends = [
        'yii\web\YiiAsset',
        'yii\bootstrap\BootstrapAsset',
    ];
}
