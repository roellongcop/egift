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
class SiteAsset extends AssetBundle
{
    public $basePath = '@webroot';
    public $baseUrl = '@web/app/assets/site/';
    public $css = [
        'assets/font-awesome/css/font-awesome.min.css',
        'assets/css/main.css',
        'assets/css/custom.css',
    ];
    public $js = [
        'assets/js/browser.min.js',
        'assets/js/breakpoints.min.js',
        'assets/js/util.js',
        'assets/js/main.js',
        'assets/js/custom.js',

    ];
    public $depends = [
        'yii\web\YiiAsset',
        // 'yii\bootstrap\BootstrapAsset',
    ];
}
