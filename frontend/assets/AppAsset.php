<?php

namespace frontend\assets;

use yii\web\AssetBundle;

/**
 * Main frontend application asset bundle.
 */
class AppAsset extends AssetBundle
{
    public function init()
    {
        parent::init();
// resetting BootstrapAsset to not load own css files
        \Yii::$app->assetManager->bundles['yii\\bootstrap\\BootstrapAsset'] = [
            'css' => [],
        ];
    }
    public $basePath = '@webroot';
    public $baseUrl = '@web';
    public $css = [
        'css/main.css',
    ];
    public $js = [
        "js/vendor/jq_cookie.js",
        "js/vendor/jquery-ui.min.js",
        "js/vendor/slick.min.js",
        "js/vendor/jquery.maskedinput.min.js",
        "js/vendor/slideout.js",
        "js/agreement.js",
        "js/main.js",
        "js/events.js",
    ];
    public $depends = [
        'yii\web\YiiAsset',
//        'yii\bootstrap\BootstrapAsset',
    ];
}
