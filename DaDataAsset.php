<?php

namespace mrssoft\dadata;

use yii\web\AssetBundle;
use yii\web\JqueryAsset;

class DaDataAsset extends AssetBundle
{
    public $sourcePath = '@vendor/mrssoft/yii2-dadata/assets';

    public $css = [
        'suggestions.min.css',
    ];

    public $js = [
        'jquery.suggestions.min.js'
    ];

    public $depends = [
        JqueryAsset::class
    ];
}