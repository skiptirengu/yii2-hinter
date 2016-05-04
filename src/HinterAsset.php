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
    public $sourcePath = '@bower/hinter.js';
    public $js = ['dist/hinter.min.js'];
    public $depends = [
        'yii\bootstrap\BootstrapAsset',
        'yii\bootstrap\BootstrapPluginAsset'
    ];
}