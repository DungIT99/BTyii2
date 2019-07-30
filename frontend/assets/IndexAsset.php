<?php

namespace frontend\assets;

use yii\web\AssetBundle;

/**
 * Main frontend application asset bundle.
 */
class IndexAsset extends AssetBundle
{
    public $basePath = '@webroot';
    public $baseUrl = '@web';
    public $css = [
 'images/icons/favicon.ico',
'fonts/font-awesome-4.7.0/css/font-awesome.min.css',
'fonts/iconic/css/material-design-iconic-font.min.css',
'vendor/animate/animate.css',
'vendor/css-hamburgers/hamburgers.min.css',
'vendor/animsition/css/animsition.min.css',
'vendor/select2/select2.min.css',
'vendor/daterangepicker/daterangepicker.css',
'css/util.css',
'css/main.css',

    ];
    public $js = [
'vendor/jquery/jquery-3.2.1.min.js',
'vendor/animsition/js/animsition.min.js',
'vendor/bootstrap/js/popper.js',
'vendor/bootstrap/js/bootstrap.min.js',
'vendor/select2/select2.min.js',
'vendor/daterangepicker/moment.min.js',
'vendor/daterangepicker/daterangepicker.js',
'vendor/countdowntime/countdowntime.js',
'js/main.js',
'js/picker.js'


    ];
    public $depends = [
        'yii\web\YiiAsset',
        'yii\bootstrap\BootstrapAsset',
    ];
}
