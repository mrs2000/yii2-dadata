<?php

namespace mrssoft\dadata;

use yii\web\AssetBundle;
use yii\web\JqueryAsset;

class DaDataAsset extends AssetBundle
{
    public $css = [
        'https://cdn.jsdelivr.net/npm/suggestions-jquery@17.12.0/dist/css/suggestions.min.css',
    ];

    public $js = [
        'https://cdn.jsdelivr.net/npm/suggestions-jquery@17.12.0/dist/js/jquery.suggestions.min.js'
    ];

    public $depends = [
        JqueryAsset::class
    ];
}