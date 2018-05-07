<?php

namespace mrssoft\dadata;

use yii\bootstrap\InputWidget;

/**
 * jQuery plugin
 * @see https://dadata.ru/suggestions/usage/
 */
class DaDataInputWidget extends InputWidget
{
    public const TYPE_ADDRESS = 'ADDRESS';
    public const TYPE_NAME = 'NAME';
    public const TYPE_BANK = 'BANK';
    public const TYPE_EMAIL = 'EMAIL';
    public const TYPE_PARTY = 'PARTY';

    public function init()
    {
        parent::init();

        $this->getView()->registerAssetBundle(DaDataAsset::class);

        $this->clientOptions = array_merge($this->clientOptions, $this->clientEvents);
        $this->registerPlugin('suggestions');
    }

    public function run()
    {
        return $this->renderInputHtml('text');
    }
}