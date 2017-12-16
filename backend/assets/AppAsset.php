<?php

namespace backend\assets;

use yii\web\AssetBundle;

/**
 * Main backend application asset bundle.
 */
class AppAsset extends AssetBundle
{
    public $basePath = '@webroot';
    public $baseUrl = '@web';
    public $css = [
        //'css/site.css',
        'css/bootstrap.min.css',
        'css/font-awesome.min.css',
        'css/smartadmin-production.min.css',
        //'css/smartadmin-skins.min.css',
        //'css/demo.min.css',
        //'css/your_style.css'

    ];
    public $js = [
        'js/jquery.min.js',
        'js/jquery-ui.min.js',
        'js/app.config.js',
        //'js/plugin/jquery-touch/jquery.ui.touch-punch.min.js',
        'js/bootstrap/bootstrap.min.js',
        //'js/notification/SmartNotification.min.js',
        'js/smartwidgets/jarvis.widget.min.js',
        'js/plugin/easy-pie-chart/jquery.easy-pie-chart.min.js',
        'js/plugin/sparkline/jquery.sparkline.min.js',
        'js/plugin/jquery-validate/jquery.validate.min.js',
        'js/plugin/masked-input/jquery.maskedinput.min.js',
        'js/plugin/select2/select2.min.js',
        'js/plugin/bootstrap-slider/bootstrap-slider.min.js',
        'js/plugin/msie-fix/jquery.mb.browser.min.js',
        'js/plugin/fastclick/fastclick.min.js',
        'js/demo.min.js',
        'js/app.min.js',
        'js/be/subexpediente.js',
        //'js/be/drow_list_update_abogado.js',
        //'js/be/modal_file.js',
        'js/be/plugins.js',
        //'js/be/tables.js',
        'js/datepicker-es.js',
        //'js/be/validar.js'
    ];
    public $depends = [
        'yii\web\YiiAsset',
        'yii\bootstrap\BootstrapAsset',
    ];
}
