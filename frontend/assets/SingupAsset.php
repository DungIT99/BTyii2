<?php

namespace frontend\assets;

use yii\web\AssetBundle;

/**
 * Main frontend application asset bundle.
 */
class SingupAsset extends AssetBundle
{
    public $basePath = '@webroot';
    public $baseUrl = '@web';
    public $css = [
        'css/register.css',
       
    ];
    public $js = [
        'js/jquery-1.11.3.min.js',
        'js/hero-slider-main.js',
        'js/bootstrap.min.js',
         'js/isInViewport.min.js',
         'js/tether.min.js',
        'js/jquery.magnific-popup.min.js',
    ];
    public $depends = [
        'yii\web\YiiAsset',
        'yii\bootstrap\BootstrapAsset',
    ];
}
