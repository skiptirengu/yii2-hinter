<?php

namespace nevermnd\hinter\tests;

use yii\web\AssetManager as BaseAsset;

/**
 * Class AssetManager
 *
 * @author Thiago Oliveira <thiago.oliveira.gt14@gmail.com>
 */
class AssetManager extends BaseAsset
{
    protected $_hashes = [];
    
    protected $_counter = 0;

    public function hash($path)
    {
        if (!isset($this->_hashes[$path])) {
            $this->_hashes[$path] = $this->_counter++;
        }

        return $this->_hashes[$path];
    }
}