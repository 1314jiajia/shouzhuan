<?php
/**
 * @link http://www.yiiframework.com/
 * @copyright Copyright (c) 2008 Yii Software LLC
 * @license http://www.yiiframework.com/license/
 */

namespace app\assets;

use yii\web\AssetBundle;

/**
 * Main application asset bundle.
 *
 * @author Qiang Xue <qiang.xue@gmail.com>
 * @since 2.0
 */
class AdminAsset extends AssetBundle
{
    public $basePath = '@webroot';
    public $baseUrl = '@web';
    public $css = [
        //Bootstrap CSS
        '/vendor/bootstrap/css/bootstrap.min.css',
        //Font Awesome CSS
        '/vendor/font-awesome/css/font-awesome.min.css',
        //Fontastic Custom icon font
        '/css/fontastic.css',

        //Google fonts - Poppins
        'https://fonts.googleapis.com/css?family=Poppins:300,400,700',

        //theme stylesheet
        '/css/style.default.css',

        '/css/custom.css',
    ];
    public $js = [
        'vendor/jquery/jquery.min.js',
        'vendor/popper.js/umd/popper.min.js',
        'vendor/bootstrap/js/bootstrap.min.js',
        'vendor/jquery.cookie/jquery.cookie.js',
        'vendor/chart.js/Chart.min.js',
        'vendor/jquery-validation/jquery.validate.min.js',
        'js/charts-home.js',
        'js/front.js',


    ];
    public $depends = [
        'yii\web\YiiAsset',
        'yii\bootstrap\BootstrapAsset',
    ];
}
