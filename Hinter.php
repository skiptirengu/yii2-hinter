<?php

namespace nevermnd\hinter;

use yii\base\InvalidConfigException;
use yii\base\Widget;
use yii\helpers\Json;

/**
 * Class Hinter
 *
 * @author Thiago Oliveira <thiago.oliveira.gt14@gmail.com>
 */
class Hinter extends Widget
{
    /**
     * @var string The key name of the success messages in the flash session.
     */
    public $successMessageParam = 'success';
    /**
     * @var string The key name of the error messages in the flash session.
     */
    public $errorMessageParam = 'error';
    /**
     * @var array Options for the hinter plugin.
     */
    public $clientOptions = [];
    /**
     * @var string The selector in wich the messages will be appended.
     */
    public $containerSelector = '';

    /**
     * @inheritdoc
     */
    public function init()
    {
        if (!$this->containerSelector) {
            throw new InvalidConfigException('containerSelector must be informed');
        }
    }

    /**
     * @inheritdoc
     */
    public function run()
    {
        $view = $this->getView();
        HinterAsset::register($view);

        $isSuccess = \Yii::$app->session->hasFlash($this->successMessageParam);
        $message   = \Yii::$app->session->get($isSuccess ? $this->successMessageParam : $this->errorMessageParam);

        $this->clientOptions = array_merge($this->clientOptions, compact('isSuccess', 'message'));

        $view->registerJs("$('$this->containerSelector').hinter(" . Json::encode($this->clientOptions) . ");");
    }
}