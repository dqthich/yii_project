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
class AppAsset extends AssetBundle
{
    public $basePath = '@webroot';
    public $baseUrl = '@web';
    public $css = [
        'css/site.css',
        'css/style1.css',
        'css/bootstrap-grid.css',
        'css/bootstrap-grid.css.map',
        'css/bootstrap-grid.min.css',
        'css/bootstrap-grid.min.css.map',
        'css/bootstrap-reboot.css',
        'css/bootstrap-reboot.css.map',
        'css/bootstrap-reboot.min.css',
        'css/bootstrap-reboot.min.css.map',
        'css/bootstrap.css',
        'css/bootstrap.css.map',
        'css/bootstrap.min.css',
        'css/bootstrap.min.css.map',
        'css/font-awesome',
        'css/font-awesome.min',
        
    ];
   
    public $js = [
        'js/bootstrap.bundle.js',
        'js/bootstrap.bundle.js.map',
        'js/bootstrap.bundle.min.js',
        'js/bootstrap.bundle.min.js.map',
        'js/bootstrap.js',
        'js/bootstrap.js.map',
        'js/bootstrap.min.js',
        'js/bootstrap.min.js.map',
        
    ];
    public $depends = [
        'yii\web\YiiAsset',
        'yii\bootstrap4\BootstrapAsset',
    ];
}
