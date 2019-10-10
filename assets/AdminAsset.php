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
        // 前端
        '/vendor/static/css/common.css',
        '/vendor/static/css/index.css',
        '/vendor/static/css/recommend.css',
        '/vendor/static/css/swiper-3.4.1.min.css',

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
        // 前端
        // '/vendor/js/clipboard.min.js',
        // '/vendor/js/common.js',
        // '/vendor/js/config.js',
        // '/vendor/js/index.js',
        // '/vendor/js/jquery-1.11.0.js',
        // '/vendor/js/recommend.js',
        // '/vendor/js/rem.js',
        // '/vendor/js/swiper-3.4.1.min.js',
        // '/vendor/js/template.js',
        // '/vendor/js/utils.js',
        // '/vendor/js/z_stat.js',

    ];
    public $depends = [
        'yii\web\YiiAsset',
        'yii\bootstrap\BootstrapAsset',
    ];
}
