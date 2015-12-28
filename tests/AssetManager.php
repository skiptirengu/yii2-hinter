<?php

namespace nevermnd\hinter\tests;

/**
 * Class AssetManager
 *
 * @author Thiago Oliveira <thiago.oliveira.gt14@gmail.com>
 */
class AssetManager extends \yii\web\AssetManager
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