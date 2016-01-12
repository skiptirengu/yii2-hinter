<?php

namespace nevermnd\hinter;

use yii\base\InvalidConfigException;
use yii\base\Widget;
use yii\helpers\ArrayHelper as Arr;
use yii\helpers\Json;

/**
 * Class Hinter
 *
 * @author Thiago Oliveira <thiago.oliveira.gt14@gmail.com>
 */
class Hinter extends Widget
{
    /**
     * @var string The key name of the success messages in the flashed into session.
     */
    public $successMessageParam = 'success';
    /**
     * @var string The key name of the error messages in the flashed into session.
     */
    public $errorMessageParam = 'error';
    /**
     * @var array Options for the hinter plugin.
     */
    public $clientOptions = [];
    /**
     * @var string The selector in wich the messages will be appended.
     */
    public $containerSelector = 'body';

    /**
     * @inheritdoc
     */
    public function init()
    {
        if (!$this->containerSelector) {
            throw new InvalidConfigException('containerSelector must be set');
        }
    }

    /**
     * @inheritdoc
     */
    public function run()
    {
        $view = $this->getView();
        HinterAsset::register($view);

        $id = isset($this->clientOptions['id']) ? $this->clientOptions['id'] : $this->getId();
        $isSuccess = \Yii::$app->session->hasFlash($this->successMessageParam);
        $message = \Yii::$app->session->getFlash($isSuccess ? $this->successMessageParam : $this->errorMessageParam);

        $this->clientOptions = Arr::merge($this->clientOptions, compact('isSuccess', 'message', 'id'));

        $view->registerJs("$('$this->containerSelector').hinter(" . Json::encode($this->clientOptions) . ");");
    }
}
