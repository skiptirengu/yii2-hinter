<?php

namespace nevermnd\hinter;

use yii\web\AssetBundle;

/**
 * Class HinterAsset
 *
 * @author Thiago Oliveira <thiago.oliveira.gt14@gmail.com>
 */
class HinterAsset extends AssetBundle
{
    public $css = [
        'css/hinter.css'
    ];
    public $js = [
        'js/hinter.js'
    ];
    public $depends = [
        'yii\bootstrap\BootstrapAsset',
        'yii\bootstrap\BootstrapPluginAsset'
    ];

    /**
     * @inheritdoc
     */
    public function init()
    {
        parent::init();
        $this->sourcePath = __DIR__ . '/assets';
    }
}